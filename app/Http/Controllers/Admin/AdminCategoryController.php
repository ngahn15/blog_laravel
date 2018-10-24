<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
       return view('admin.category.index')->with('cates',Category::all());
    }

    public function show($id)
    {
        $cate = Category::find($id);
        return view('admin.category.show')->with('cate',$cate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
        ]);

        $input = $request->all();
        $cate = new Category;
        $cate->title = $input['title'];
        $cate->save();

        return redirect('admin/category')->with('success','cate Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $cate = Category::find($id);

        return view('admin.category.edit')->with('cate',$cate);
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

        $this->validate($request,[
            'title' => 'required|max:255',
        ]);

        $input = $request->all();
        $cate = Category::find($id);
        $cate->title = $input['title'];
        $cate->save();

        return redirect('admin/category/' . $cate->id)->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect('admin/category/' . $cate->id)->with('success','Category Deleted');
    }
}
