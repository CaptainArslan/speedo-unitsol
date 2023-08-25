<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $user = User::where('email', $request->email)->first();
        if ($user && $user->is_admin != true && $user->is_trainer != true) {
            if ($this->attemptLogin($request)) {
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                }
                $agent = new Agent();
                $browser = $agent->browser();
                $platform = $agent->platform();
                LoginHistory::create([
                    'user_id'=>$user->id,
                    'ip'=>$request->ip(),
                    'browser' => $browser . ' on ' . $platform,
                ]);
                $students=Student::where('user_id',$user->id)->get();
                    foreach($students as $student){
                        if($student->getFeeDate() >= 1){
                            $student->update(['annual_fee' => 'Pending',
                            'fee_paid_date' => null,
                            ]);
                     }
                    }
                return $this->sendLoginResponse($request);
            }
            $this->incrementLoginAttempts($request);
            // return back()->with('message', 'Credential Not Match');
            return $this->sendFailedLoginResponse($request);
        } else {
            return $this->sendFailedLoginResponse($request);
            // return back()->with('message', 'The given data was invalid');
        }
    }

    protected function sendLoginResponse(Request $request)
    {
        if ($request->is('api/*') == false) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
        }

        if ($request->is('api/*')) {
            $this->attemptLogin($request);
            $user = auth()->user();
            return response()->json(['status' => true, 'message' => 'Login Successfully', 'data' => $user], 200);
        }
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            :  redirect('parent/students');
    }
    public function adminlogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $user = User::where('email', $request->email)->first();
        if ($user?->is_admin == true) {
            if ($this->attemptLogin($request)) {
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                }

                return $this->adminSendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            // return back()->with('message', 'Credential Not Match');
            return $this->sendFailedLoginResponse($request);
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    protected function adminSendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('admin/dashboard');
    }
    public function trainerlogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $user = User::where('email', $request->email)->first();
        if ($user && $user->is_trainer == true) {
            if ($this->attemptLogin($request)) {
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                }
                $agent = new Agent();
                $browser = $agent->browser();
                $platform = $agent->platform();
                LoginHistory::create([
                    'user_id'=>$user->id,
                    'ip'=>$request->ip(),
                    'browser' => $browser . ' on ' . $platform,
                ]);
                return $this->trainerSendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }
    protected function trainerSendLoginResponse(Request $request)
    {
        if ($request->is('api/*') == false) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
        }
        $current_time = Carbon::now();
        if ($request->is('api/*')) {
            $this->attemptLogin($request);
            $user = auth()->user();
            $user['user_doc'] = $user->userDoc;
            $user['image_path'] = env('APP_IMAGE_URL') . 'user-req-doc';
            // LoginHistory::create(['user_id' => $user->id,
            //     'login_time' => $current_time->toDateTimeString(),
            //     'browser' => $current_time->toDateTimeString(),
            // ]);
            return response()->json(['status' => true, 'message' => 'Login Successfully', 'data' => $user], 200);
        }
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('trainer/dashboard');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
