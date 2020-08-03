<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Post;
use App\Server;
use App\User;
use App\Comment;
use App\Notifications\NewCommentAdded;
use App\Notifications\NewReplyAdded;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

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
    public function create(Server $server, Post $post)
    {
        return view('comments.create',[
            'post' => $post,
            'server' => $server
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request,Server $server, Post $post)
    {       
            //If is not a reply
            $comment_id = null;
            
            //Check if Comment is a reply
            if($comment = Comment::find($request->comment)){
                $comment_id = $comment->id;

            }
            

            //Create new comment
            $reply = auth()->user()->comments()->create([
                'content' => $request->content,
                'post_id' => $post->id,
                'parent' => $comment_id
            ]);

                //Notify Comment Author of the new reply
            if($comment and $comment->user->id != auth()->user()->id)
                $comment->user->notify(new NewReplyAdded($reply));

            //Check if user is post author
            if($post->user->id != auth()->user()->id){

                $post->user->notify(new NewCommentAdded($reply));
                
            }

           
            
            //Flash message
            session()->flash('success','Comment submitted.');

            //Redirect to post
            return redirect()->route('posts.show',[$server->url,$post->slug]);



        /*
        //Notify all users
        
        while($comment){
                
                $comment->user->notify(new NewReplyAdded($comment));
             
                $comment = Comment::find($comment->parent);
    
            }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function reply(Server $server, Post $post, Comment $comment)
    {
        return view('comments.reply',[
            'server' => $server,
            'post' => $post,
            'comment' => $comment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server, Post $post, Comment $comment)
    {
        return view('comments.create',[
            'server' => $server,
            'post' => $post,
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Server $server, Post $post, Comment $comment)
    {
        $comment->content = $request->content;
        $comment->save();
        return view('posts.show',[
            'server' => $server,
            'post' => $post
        ]);
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
