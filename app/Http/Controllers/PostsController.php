<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        $cates = Category::all();
        return view('posts.index',compact('posts','cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::all();
        return view('posts.create',compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required',
            'fileImage' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('fileImage')) {
            $image = $request->fileImage;
            $path = public_path('image/uploads');
            $image->move($path, $image->getClientOriginalName());
        } else {
            $image = 'noImage.jpg';
        }
        
        $input = $request->all();
        $post = new Post;
        $post->title = $input['title'];
        $post->description = $input['description'];
        $post->image = $input['fileImage']->getClientOriginalName();
        $post->cate_id=$input['cate'];
        $post->user_id=auth()->user()->id;
        $post->status=0;

        $post->save();

        return redirect('/post/' . $post->id)->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cates = Category::all();
        $cateID = Category::find($post->id);
        
        return view('posts.edit',compact('post','cates','cateID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required',
            // 'fileImage' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('fileImage')) {
            $image = $request->fileImage;
            $path = public_path('image/uploads');
            $image->move($path, $image->getClientOriginalName());
        } else {
            $image = $post->image;
        }
        
        $input = $request->all();
        $post->title = $input['title'];
        $post->description = $input['description'];
        $post->image = $input['fileImage']->getClientOriginalName();
        $post->cate_id=$input['cate'];
        $post->user_id=auth()->user()->id;
        $post->status=0;

        $post->save();
        return redirect('/post/' . $post->id)->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
