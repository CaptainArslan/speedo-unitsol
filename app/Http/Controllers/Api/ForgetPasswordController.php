<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\UserReqDoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function sendPasswordResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required',
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
            return response()->json(['status' => true, 'message' => 'A reset code has been sent to your email address'], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'Email Not Found'], 200);
        }
    }

    public function validateResetCode(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $reset_code =  PasswordReset::where('token', $request->code)->first();
        if ($reset_code) {
            PasswordReset::where('token', $request->code)->delete();
            return response()->json(['status' => true, 'message' => 'Code Verify Successfully'], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid Code'], 200);
        }
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['status' => true, 'message' => 'Password Update Successfully'], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'Email Not Found'], 200);
        }
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => ['unique:users,email,' . $request->user_id],
        ]);
        $user = User::find($request->user_id);
        $user_doc = $user->userDoc;
        $image=$request->image;
        $image_name = '';
        if ($image) {
            $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/user-req-doc', $name);
            $image_name = $name;
        }
        $user->update([
            'first_name'=>$request->first_name?$request->first_name:$user->first_name,
            'middle_name' => $request->middle_name ? $request->middle_name : $user->middle_name,
            'last_name'=>$request->last_name?$request->last_name:$user->last_name,
            'dob'=>$request->dob?$request->dob:$user->dob,
            'contact_number'=>$request->contact_number?$request->contact_number:$user->contact_number,
            'address'=>$request->address?$request->address:$user->address,
            'email'=>$request->email?$request->email:$user->email,
        ]);
        if(!is_null($user_doc)){
            $user_doc->update(['image' => $image_name ? $image_name : $user_doc->image,
            ]);
        }else{
            if($image_name != ''){
                UserReqDoc::create(['user_id' => $user->id,
                'image'=>$image_name,
                ]);
            }
           
        }
         $user['user_doc'] = $user->userDoc;
         $user['image_path'] = env('APP_IMAGE_URL') . 'user-req-doc';
        return response()->json(
            [
                'status' => true,
                'message' => 'Profile Update Successfully',
                 'data' => $user,
            ],
            200
        );
    }
}
