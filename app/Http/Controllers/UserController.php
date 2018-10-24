<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user_id = auth()->user()->id;
        $user = User::find($id);
        // dd($info);
        return view('profile.show')->with('info',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        return view('profile.edit')->with('info',User::find($user_id));
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
            'name' => 'required|max:255',
            'password' => 'required|string|min:6|confirmed',
            // 'fileImage' => 'image|nullable|max:1999',
        ]);

        // if ($request->hasFile('fileImage')) {
        //     $img = $request->fileImage;
        //     $path = public_path('img/uploads');
        //     $img->move($path, $img->getClientOriginalName());
        // } else {
        //     $img = 'noImage.jpg';
        // }

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $input = $request->all();
        $user->name = $input['name'];
        $user->password = \Hash::make($input['password']);
        // $user->img = $input['fileImage']->getClientOriginalName();

        $user->save();
        return redirect('/profile/' . $user->id)->with('success','User Updated');
    }
}
