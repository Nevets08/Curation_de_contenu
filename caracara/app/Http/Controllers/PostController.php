<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tableau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('post.index', ['posts' => Post::orderBy('created_at', 'desc')->get(), 'allTableaux' => Tableau::all(), 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $data = $request->validated();

        $post = new Post();
        $post->fill($data);
        $post->user()->associate($data['user_id']); //un à plusieurs
        $post->save();
        $post->tableaux()->attach($data['tableau']); //plusieurs à plusieurs

        $user = Auth::user();
        if(array_key_exists('created_from', $data))
            return redirect()->route('tableau.show', ['tableau' => $data['created_from'], 'user' => $user]);
        else
            return redirect()->route('home');
        return redirect()->route('tableau.show', ['tableau' => $data['created_from'], 'user' => $user]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'user' => 'sometimes|required | exists:users,id',
            'like' => 'sometimes|required | boolean',
            'tableau.*' => 'exists:tableaux,id'
        ]);

        //Likes
        if(array_key_exists('like', $data)){
            if($data['like'])
                $post->likes()->attach($data['user']);
            else
                $post->likes()->detach($data['user']);
        }

        //Reposts
        if(array_key_exists('tableau', $data))
            $post->tableaux()->attach($data['tableau']);

        $user = Auth::user();
        // return redirect()->route('post.index', ['posts' => Post::orderBy('created_at', 'desc')->get(), 'user' => $user]);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('home');
    }
}
