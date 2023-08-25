<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Emirate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user() && auth()->user()->is_admin == true ){
            return redirect('admin/dashboard');
        }elseif(auth()->user() && auth()->user()->is_trainer == true){
            return redirect('trainer/dashboard');
        }elseif(auth()->user()) {
            return redirect('parent/students');

        }else{
            return view('welcome');
        }
        
    }
    public function ViewArea()
    {
        $emirates=Emirate::all();
        $areas=Area::all();
        return view('add_area',get_defined_vars());
    } 
    public function addArea(Request $request)
    {
        Area::create([
            'name'=>$request->name,
            'emirate_id' => $request->emirate_id,
        ]);
        return back();
    }
    public function addEmirate(Request $request)
    {
        Emirate::create([
            'name'=>$request->name,
        ]);
        return back();
    }
    public function emirateDelete($id)
    {
        $record=Emirate::find($id);
        $record->delete();
        return back();
    }
    public function areaDelete($id)
    {
        $record=Area::find($id);
        $record->delete();
        return back();
    }
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallbackUrl()
    {
        $new_user= Socialite::driver('google')->stateless()->user();
        $user=User::where('email',$new_user->email)->first();
        if(!is_null($user)){
            Auth::login($user);
            return redirect('parent/students');
        }else{
            $record=User::create([
                'email'=>$new_user->email,
                'country_code'=>'+971',
                'password' => Hash::make('password'),
            ]);
            $record->roles()->attach(3);
            Auth::login($record);
            return redirect('parent/profile');
        }
    }
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookCallbackUrl()
    {
        $new_user= Socialite::driver('facebook')->stateless()->user();
        $user=User::where('email',$new_user->email)->first();
        if(!is_null($user)){
            Auth::login($user);
            return redirect('parent/students');
        }else{
            $record=User::create([
                'email'=>$new_user->email,
                'country_code'=>'+971',
                'password' => Hash::make('password'),
            ]);
            $record->roles()->attach(3);
            Auth::login($record);
            return redirect('parent/profile');
        }
    }
}
