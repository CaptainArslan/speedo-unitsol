<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    const TITLE = 'Setting';
    const VIEW = 'admin/setting';
    const URL = 'admin/settings';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
        ]);
    }
    public function index()
    {
        abort_if(Gate::denies('view_setting'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $setting = Setting::first();
        return view(self::VIEW . '.index', get_defined_vars());
    }
    public function settingEmail()
    {
        abort_if(Gate::denies('email_setting'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $setting = Setting::first();
        return view(self::VIEW . '.email', get_defined_vars());
    }
    public function settingSecurity()
    {
        abort_if(Gate::denies('security_setting'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $setting = Setting::first();
        return view(self::VIEW . '.security', get_defined_vars());
    }
    public function SettingAccount()
    {
        abort_if(Gate::denies('account_activity_setting'), Response::HTTP_FORBIDDEN, 'Forbidden');
        return view(self::VIEW . '.account_activity');
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $image = $request->business_logo;
        $image_name = '';
        if ($image) {

            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/setting', $name);
            $image_name = $name;
        }

        $setting->fill($request->all());
        $setting->user_id = Auth::id();
        $setting->maintanance_mode = $request->maintanance_mode ? 1 : 0;
        $setting->business_logo = $image_name ? $image_name : $setting->business_logo;
        $setting->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update  Successfully'
            ],
            200
        );
    }
}
