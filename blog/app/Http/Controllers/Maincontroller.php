<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Posts;

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
        $posts = Posts::paginate(3);
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
        $path = $request->image->store('images', 's3');

      /*  Posts::create(
          request(array('lastname','firstname','middlename','phone','email'))
        );*/

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
