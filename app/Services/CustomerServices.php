<?php

namespace App\Services;

use App\Mail\OtpEmail;
use App\Models\EmailOtp;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerServices
{
    public function resendOTP($request){
        $otp = rand(100000, 999999);
        EmailOtp::updateOrCreate(['email'=>$request->session()->get('reg_email')],[
            'email'=>$request->session()->get('reg_email'),
            'otp'=>$otp,
            'expired_at'=>Carbon::now()->addMinutes(10),
        ]);
        Mail::to($request->session()->get('reg_email'))->send(new OtpEmail($otp));
        Alert::success('Success', 'OTP Resent Successfull');
        return redirect()->back();
    }


    public function addVerifiedUser($request){
        $request->validate([
            'otp'=>'required|size:6',
        ]);

        $isTrue = EmailOtp::where('email', $request->session()->get('reg_email'))
        ->where('otp', $request->otp)
        ->where('expired_at', '>=', Carbon::now())
        ->first();

        if(! $isTrue){
            throw ValidationException::withMessages([
                'message'=> 'Sorry, Incorrect OTP or OTP is expired!',
            ]);
        }
            
        $user = User::create([
            'name'=>$request->session()->get('reg_name'),
            'email'=>$request->session()->get('reg_email'),
            'password'=>$request->session()->get('reg_password'),
        ]);
        Auth::login($user);
        $isTrue->delete();
        $request->session()->forget('reg_name');
        $request->session()->forget('reg_email');
        $request->session()->forget('reg_password');
        Alert::success('Congratulations', 'Sign Up Successfull');
    }
}
