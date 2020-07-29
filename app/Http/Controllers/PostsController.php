<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\Forum;
use App\User;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Forum $forum)
    {
        
         return view('posts.create',[
            'forum' => $forum
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Forum $forum, CreatePostRequest $request)
    {
        auth()->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'forum_id' => $forum->id,
            'slug' => Str::slug($request->title)

        ]);

        session()->flash('success','Post created.');

        return redirect()->route('forums.show',$forum->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum,Post $post)
    {
        $post->increment('visits');
        return view('posts.show',[
            'post' => $post,
            'forum' => $forum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
