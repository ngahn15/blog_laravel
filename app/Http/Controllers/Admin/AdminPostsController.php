<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class AdminPostsController extends Controller
{
	public function index()
    {
    	$posts = Post::all();
    	return view('admin.posts.home')->with('posts',$posts);
    }
    public function getPostPublic()
    {
    	$posts_p = Post::where('status',1)->get();
    	return view('admin.posts.index')->with('posts',$posts_p);
    }

    public function getPostUnpublic()
    {
        $posts_u = Post::where('status',0)->get();
        return view('admin.posts.index')->with('posts',$posts_u);
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show')->with('post',$post);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post',$post);
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

        $input = $request->all();
        if ($input['status'] == 0) {
            $input['status'] = 1;
        }

        $post = Post::find($id);
        $post->status = $input['status'];
        $post->save();

        return redirect('admin/post/' . $post->id)->with('success','post Updated');
    }

    

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('admin/post/')->with('success','Post Deleted');
    }
}
