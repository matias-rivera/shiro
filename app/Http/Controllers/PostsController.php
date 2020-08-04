<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Server;
use App\User;
use App\Comment;
use App\Notifications\BestComment;
use App\Notifications\NewPostOnServer;

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
    public function create(Server $server)
    {
        
         return view('posts.create',[
            'server' => $server
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Server $server, CreatePostRequest $request)
    {
        
        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'server_id' => $server->id,
            'slug' => Str::slug($request->title)

        ]);
        
        /* Notify to all subscribed users */
        foreach ($server->users as $user) {
            if($post->user->id != $user->id){
                $user->notify(new NewPostOnServer($post));
            }
        }

    
    

        session()->flash('success','Post created.');

        return redirect()->route('servers.show',$server->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server,Post $post)
    {
        $post->increment('visits');
        return view('posts.show',[
            'post' => $post,
            'server' => $server
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server, Post $post)
    {
        return view('posts.create',[
            'server' => $server,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Server $server, Post $post)
    {

        //Add title edit later
        $post->content = $request->content;
        $post->save();
        
        return view('posts.show',[
            'post' => $post,
            'server' => $server
        ]);
    }

    public function comment(Post $post, Comment $comment)
    {
        //add middleware later
        //Check if auth user is the same that the post author 
        //and if the post author is not the comment author
        if(auth()->user()->id == $post->user->id && $comment->user->id != $post->user->id){
            $post->update(['comment_id' => $comment->id]);
            $comment->user->notify(new BestComment($comment));
        } 
        
        
        return redirect()->back();
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
