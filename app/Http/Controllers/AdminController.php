<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

use Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class AdminController extends Controller
{
    //
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $admin = new Admin();
        $check = False;
        $admin = Admin::where('email' , "$request->email")->get();
        foreach($admin as $adm){
            if($adm->email == $request->email && $adm->password == $request->password){
                $check = TRUE;
            }
        }
        if($check == TRUE){
            FacadesAlert::success('Congratulations!', 'Admin Login Successful');
            return redirect('admin-portal');
        }
        else{
            FacadesAlert::warning('Opps!', 'Wrong Email or Password');
            return redirect()->back();
        }
    }
}
