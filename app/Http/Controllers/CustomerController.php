<?php

namespace App\Http\Controllers;

use App\Mail\OtpEmail;
use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\EmailOtp;
use App\Models\User;
use App\Services\CustomerServices;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class CustomerController extends Controller
{

    protected $customer_services;

    public function __construct(CustomerServices $customer_services)
    {
        $this->customer_services = $customer_services;
    }
    //
    function addCustomer(Request $request){
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8|string|confirmed'
        ]);
        $otp = rand(100000, 999999);
        EmailOtp::updateOrCreate(['email'=>$request->email],[
            'email'=>$request->email,
            'otp'=>$otp,
            'expired_at'=>Carbon::now()->addMinutes(10),
        ]);
        
        Mail::to($request->email)->send(new OtpEmail($otp));
        $request->session()->put('reg_email', $request->email);
        $request->session()->put('reg_name', $request->name);
        $request->session()->put('reg_password', Hash::make($request->password));
        return redirect()->route('store.otp');
    }

    function storeOtp(){
        return view('confirm-otp');
    }

    function verifyOtp(Request $request){
        if($request->path() == 'resend-otp'){
            $this->customer_services->resendOTP($request);
            return redirect()->back();
        }
        else{
            $this->customer_services->addVerifiedUser($request);
            return redirect('/');
        }
    }

    function login(Request $request){
        $validated = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            FacadesAlert::success('Congratulations', 'Log in Successfull');
            return redirect('/home');
        }
        throw ValidationException::withMessages([
            'credentials'=> 'Sorry, Incorrect Credentials',
        ]);
    }

    function signOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
