<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountSettingController extends Controller
{
    const TITLE = 'Account Setting';
    const VIEW = 'trainer/account_setting';
    const URL = 'trainer/account-settings';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }
    public function index()
    {
        $user=auth()->user();
        return view(self::VIEW . '.index',get_defined_vars());
    }
    public function profileUpdate(Request $request, $id)
    {
        $request->validate([
            'email' => ['unique:users,email,' . $id],
        ]);

        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
    }
    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'password' => 'required|min:8',
            'confirm_password' => 'same:password',
        ]);

        $user=User::find($id);
        $user->update(['password' => Hash::make($request->password),
        ]); return response()->json(
            [
                'success' => true,
                'message' => 'Password Change Successfully'
            ],
            200
        );
    }
    public function saveActivityLog(Request $request, $id)
    {
        
        $user = User::find($id);
        $user->update(['activity_log' => $request->activity_log != 1 ? true : false,
        ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Activity Change Successfully'
            ],
            200
        );
    }
}
