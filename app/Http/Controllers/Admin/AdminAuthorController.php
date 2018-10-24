<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;

class AdminAuthorController extends Controller
{

    public function index()
    {
        $authors = User::all();
        return view('admin.authors.index')->with('authors',$authors);
    }

    public function show($id)
    {
        $author = User::find($id);
        return view('admin.authors.show')->with('author',$author);
    }

    public function destroy($id)
    {
        $author = User::find($id);
        $author->delete();
        return redirect('admin/author/')->with('success','author Deleted');
    }
}
