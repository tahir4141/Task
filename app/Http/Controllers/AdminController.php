<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\CompanyPolicy;
use App\Models\Purchase;
use App\Models\transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{


    public function _index()
    {
        if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
            return view('Admin.home');
        } else {
            return redirect('/adminLogin');
        }
    }


    public function _claim()
    {
        if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
            return view('Admin.claim');
        } else {
            return redirect('/adminLogin');
        }
    }



    public function _request()
    {
        if (Session::has('user') && ((Session::get('user')['type'] == 'superadmin') || (Session::get('user')['type'] == 'admin'))) {
            $policies = Purchase::where('status', '=', 'under verification')->get();
            return view('Admin.request')->with('purchases', $policies);
        } else {
            return redirect('/adminLogin');
        }
    }

    public function _signupAdmin()
    {
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            return view('Admin.signupAdmin');
        } else {
            return redirect('/superadminLogin');
        }
    }

    public function _signup(Request $request)
    {
        $validators = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|max:255|unique:admins,email',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $response = $user->save();
        if ($response) {
            return back()->with('success', 'Admin Registered Successfully !!!');
        } else {
            return back()->with('fail', 'Ohooo .. Something Wrong !!');
        }
    }


    public function _loginPage()
    {
        return view('Admin.login');
    }

    public function  _login(Request $request)
    {
        $validators = $request->validate([
            'email' => 'required|max:255|exists:admins',
            'password' => 'required|min:6'
        ]);
        $admin = Admin::where(['email' => $request->email])->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('fail', "The Email or Password Incorrect !!");
        }
        $request->session()->put('user', $admin);
        return redirect('/adminHome');
    }


    public function _admins()
    {
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            $admins = Admin::all();
            return view('Admin.admins')->with('admins', $admins);
        } else {
            return redirect('/superadminLogin');
        }
    }


    public function _delete($id)
    {
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            $admin = Admin::find($id)->delete();
            if ($admin) {
                return redirect('/adminsList');
            } else {
                return back()->with('fail', 'Something Wrong ');
            }
        } else {
            return redirect('superadminLogin');
        }
    }

    public function _updatePage($id)
    {
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            $admin = Admin::find($id);
            if ($admin) {
                return view('Admin.updatePage')->with('admin', $admin);
            } else {
                return back()->with('fail', ' Something Wrong !!');
            }
        } else {
            return redirect('/superadminLogin');
        }
    }

    public function _update(Request $request)
    {
        $validators = $request->validate([
            'id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'mobile' => 'required|min:6000000000|max:9999999999|numeric',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        if (Session::has('user') && (Session::get('user')['type'] == 'superadmin')) {
            $admin = Admin::findOrFail($request->id);
            $admin->email = $request->email;
            $admin->name = $request->name;
            $admin->mobile = $request->mobile;
            $admin->password = Hash::make($request->password);
            $response = $admin->save();
            if ($response) {
                return redirect('/adminsList');
            } else {
                return back()->with('fail', 'Ohooo .. Something Wrong !!');
            }
        } else {
            return redirect('/superadminLogin');
        }
    }


    public function _logout()
    {

        if (Session::has('user')) {
            if (Session::get('user')['type'] === 'admin') {
                Session::forget('user');
                Session::forget('risks');
                Session::forget('risk');
                Session::forget('vrisks');
                return redirect('adminLogin');
            }
            if (Session::get('user')['type'] === 'superadmin') {
                Session::forget('user');
                Session::forget('risks');
                Session::forget('risk');
                Session::forget('vrisks');
                return redirect('/superadminLogin');
            }
        } else {
            return redirect('/adminLogin');
        }
    }

    public function _acceptRequest(Request $request){
        $purchasePolicy = Purchase::find($request->id);
        // return $purchasePolicy;'
        $policy = CompanyPolicy::find($purchasePolicy['policyid']);
        $purchasePolicy->expired_policy = Carbon::now()->addMonths($policy['policy_period']);
        $purchasePolicy->status = " Request Accepted ";
        $purchasePolicy->reason = "Successfully Varified ";
        $response= $purchasePolicy->save();
        if($response){
            return redirect('/requestPage');
        }else{
            return back()->with('fail', 'something wrong');
        }
    }

    public function _rejectRequest($id){
        if(Session::has('user') && (Session::get('user')['type']=='admin' || Session::get('user')['type']=='superadmin')){
        $purchasePolicy = Purchase::find($id);
        $purchasePolicy->status = " Request Rejected ";
        $purchasePolicy->reason = "Have some issue in Documents, Money will be Return within 48 hours ";
        $response= $purchasePolicy->save();
        if($response){
            return redirect('/requestPage');
        }else{
            return back()->with('fail', 'something wrong');
        }
    }else{
        return redirect('/adminlogin');
    }
    }
}
