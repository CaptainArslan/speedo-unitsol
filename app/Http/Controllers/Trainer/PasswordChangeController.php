<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordChangeController extends Controller
{
    const VIEW = 'trainer';

    public function sendPasswordResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
        ]);
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            PasswordReset::where('email', $request->email)->delete();
            $code = random_int(100000, 999999);
            PasswordReset::insert([
                'email' => $request->email,
                'token' => $code,
                'created_at' => Carbon::now()
            ]);
            Mail::send('mail.code', ['token' => $code, 'name' => $user->first_name], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            return redirect('verify_code_view?email=' . $user->email);
        } else {
            return response()->json(['status' => false, 'message' => 'Email Not Found'], 200);
        }
    }
    public function verifyCodeView(Request $request)
    {
        return view('auth.passwords.code',get_defined_vars());
    }
    public function validateResetCode(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:password_resets',
        ]);
        // dd($request);
        $reset_code =  PasswordReset::where('token', $request->token)->first();
        if ($reset_code) {
            PasswordReset::where('token', $request->token)->delete();
            return redirect('password?email=' . $request->email);
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid Code'], 200);
        }
    }
    public function password(Request $request)
    {
        return view('auth.passwords.reset',get_defined_vars());

    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect('trainer/login');
        } else {
            return response()->json(['status' => false, 'message' => 'Email Not Found'], 200);
        }
    }
}
