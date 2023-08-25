<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Country;
use App\Models\Emirate;
use App\Models\User;
use App\Models\UserPaymentInformation;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    const VIEW = 'parent';


    public function __construct()
    {
        view()->share([]);
    }
    public function index(Request $request)
    {

        return view(self::VIEW . '.dashboard.index');
    }
    public function profile()
    {
        $user = auth()->user();
        $countries = Country::all();
        $emirates = Emirate::all();
        $emirates = Emirate::all();
        $areas = Area::where('emirate_id', $user->emirate_id)->get();
        return view(self::VIEW . '.dashboard.profile', get_defined_vars());
    }
    public function getArea(Request $request)
    {
        $user = auth()->user();
        $records = Area::where('emirate_id', $request->emirate_id)->get();
        return view(self::VIEW . '.dashboard.partial.area', get_defined_vars());
    }
    public function payment()
    {
        $user = auth()->user();
        $intent = $user->createSetupIntent();
        $check = null;
        return view(self::VIEW . '.dashboard.payment', get_defined_vars());
    }
    public function security()
    {
        $user = auth()->user();
        return view(self::VIEW . '.dashboard.security', get_defined_vars());
    }
    public function profileUpdate(Request $request, $id)
    {
        $request->validate([
            'email' => ['unique:users,email,' . $id],
            'contact_number' => 'required|integer',
            'first_name' => 'required',
            // 'last_name' => 'required',
            'gender' => 'required',
            'emirate_id' => 'required',
            'area_id' => 'required',
            'relation' => 'required',
            // 'contact_number' => 'nullable|integer|digits:9',
            'dob' => 'required|date|before:-18 years'
        ]);

        $user = User::find($id);
        $user->fill($request->all());
        $user->emirate_id = $request->emirate_id;
        $user->area_id = $request->area_id;
        $user->relation = $request->relation;
        $user->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Your have updated your profile Successfully.'
            ],
            200
        );
    }
    public function addPayment(Request $request, $id)
    {
        // dd($request->all());
        $user = User::find($id);
        $user_payment_information = new UserPaymentInformation;
        $user_payment_information->fill($request->all());
        $user_payment_information->user_id = $user->id;
        $user_payment_information->flag = $request->flag ? $request->flag : 0;
        $user_payment_information->save();
        $check = null;
        // $user = auth()->user();
        $intent = $user->createSetupIntent();
        if ($request->flag) {
            $check = 1;

            return view(self::VIEW . '.dashboard.payment', get_defined_vars());
        } else {
            $check = 2;
            return view(self::VIEW . '.dashboard.payment', get_defined_vars());
        }
    }
    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'password' => 'required|min:8',
            'confirm_password' => 'same:password',
        ]);

        $user = User::find($id);
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return response()->json(
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
        $user->update([
            'activity_log' => $request->activity_log != 1 ? true : false,
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
