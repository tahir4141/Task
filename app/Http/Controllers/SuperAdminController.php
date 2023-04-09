<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{
    public function _homeSuperadmin()
    {
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            return view('SuperAdmin.home');
        } else {
            return redirect('/superadminLogin');
        }
    }



    public function _loginSuperadminPage()
    {
        return view('SuperAdmin.login');
    }


    public function _login(Request $request)
    {
            $validators =$request->validate( [
            'email' => 'required|max:255',
            'password' => 'required|min:6'
        ]);
            $user = SuperAdmin::where(['email' => $request->email])->first();
            
            if (!$user || ($request->password!==$user->password)) {
               return back()->with('fail',"The Email or Password Incorrect !!");
            }else{
                $request->session()->put('user',$user);
                return redirect('/superadminHome');
            }
    }

    public function _logout()
    {
        Session::forget('user');
        Session::forget('risks');
        Session::forget('risk');
        Session::forget('vrisks');
        return redirect('/superadminLogin');
    }

}
