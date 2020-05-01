<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Posts;
use Illuminate\Support\Facades\Auth;

class Maincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        $posts = Posts::paginate(2);
        return view('posts.posts',  compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        $post = new Posts;
        if ($request->hasFile('image')) {
          $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('images/posts', $fileNameToStore,'public');
            $post->image = $path;
        }
        $post->title = $request->title;
        $post->user_id = Auth::id();
        $post->content = $request->content;
        $post->save();

        return redirect('/');
    }

 /**
     * Create post.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.add');
    }


 /**
     * Edit user.
     *
     * @return Response
     */
    public function edit(Posts $post)
    {
        return view('posts.edit', compact('post'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        $this->validate(request(),[
            'lastname'=>'required',
            'firstname'=>'required',
            'middlename'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]
        );
     $post->update(request(['lastname','firstname','middlename','phone','email']));
       return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        $post->delete();
        return redirect('/');
    }
}
