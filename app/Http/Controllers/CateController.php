<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CateController extends Controller
{
    public function index()
    {
    	$cates = Category::all();
    	// dd($cates);
    	return view('inc.nav',['cates'=>$cates]);
    }

}
