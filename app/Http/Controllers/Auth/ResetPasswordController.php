<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use Curl;
use Session;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    //use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function send_otp(Request $request)
    {
        $data = DB::table('users')->where('email',$request->email_id)->get();
        $otp = mt_rand(1000,9999);
        $msg = $otp." Is your OTP to reset password";
        Session::put('otp',$otp);
        Session::put('email_id',$request->email_id);
        // Session::get('otp')
        if(count($data) > 0) 
        {
            Curl::to('http://103.127.157.58/vendorsms/pushsms.aspx?clientid=cbffd407-7347-4cf3-bbcd-c7e224550458&apikey=cf3864a4-b05c-45bc-bd32-6fb39619ed3d&msisdn=91'.$data[0]->UserMobile.'&sid=ONETIC&msg='.urlencode($msg).'&fl=0&gwid=2')->get();
            return response()->json('OTP Send Successfully on your registered Mobile No.', 200);
        }
        else
        {
            return response()->json('User Does Not Exist', 200);
        }
    }

    public function verify_otp(Request $request)
    {
        if(Session::get('otp') == $request->otp)
        {
            // Session::flush();
            return response()->json('Otp Verified', 200);
        }
        else
        {
            return response()->json('Otp Not Verified', 200);
        }
    }

    public function new_password(Request $request)
    {
        $password = $request->password;
        $cn_password = $request->confirmpassword;
        if($password == '' || $cn_password == '')
        {
            return response()->json("Please Fill Both Password and Confirm Password",200);
        }
        else if($password != $cn_password)
        {
            return response()->json("Please Enter Same Password In Both Fields",200);
        }
        else
        {
            DB::table('users')->where('email', Session::get('email_id'))
            ->update(['password' => Hash::make($password)]);
            Session::flush();
            return response()->json("200",200);
        }
    }
}
