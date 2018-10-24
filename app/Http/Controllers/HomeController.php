<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::where('status',1)->orderBy('created_at','desc')->get();
        return view('home',compact('posts'));
    }

    public function login()
    {
        if (\Auth::check()) {
            return redirect('/');
        }
    	return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function check(Request $request)
    {
    	$data=[
    		'username'=>$request->username,
    		'password'=>$request->password,
    	];
    	if(\Auth::attempt($data)){
    		return redirect('/account/'. \Auth::id());
    	}else{
    		return redirect('/');
    	}
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $input = $request->all();
        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->password = Hash::make($input['password']);
        $user->remember_token = csrf_token();
        $user->save();

        return redirect('/account/' . $user->id)->with('success','user Created');
    }
    public function logout()
    {
    	\Auth::logout();
		return redirect('/');
    }

    public function getPostByCate($id)
    {
        $cates = Category::with('posts')->get();
        $posts = Post::where('cate_id',$id)->where('status',1)->get();
        return view('home',compact('posts','cates'));
    }
}
