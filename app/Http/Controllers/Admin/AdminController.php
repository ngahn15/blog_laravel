<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    public function login()
    {
        if (\Auth::guard('admin')->check()) {
            return redirect('admin/home');
        }
    	return view('admin.login');
    }

    public function check(Request $request)
    {
    	$data=[
    		'username'=>$request->username,
    		'password'=>$request->password,
    	];
    	if(Auth::guard('admin')->attempt($data)){
    		return redirect('admin/home');
    	}else{
    		return redirect('admin/login');
    	}
    }

    public function register()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin',
            'username' => 'required|string|max:255|unique:admin',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $input = $request->all();
        $admin = new Admin;
        $admin->name = $input['name'];
        $admin->email = $input['email'];
        $admin->username = $input['username'];
        $admin->password = Hash::make($input['password']);
        $admin->remember_token = csrf_token();
        $admin->save();

        return redirect('admin/account/' . $admin->id)->with('success','admin Created');
    }

    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
