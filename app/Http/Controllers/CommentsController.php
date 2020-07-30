<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\Post;
use App\Forum;
use App\User;
use App\Comment;

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
    public function create(Forum $forum, Post $post)
    {
        return view('comments.create',[
            'post' => $post,
            'forum' => $forum
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request,Forum $forum, Post $post)
    {
            $comment_id = null;
            if($comment = Comment::find($request->comment))
            $comment_id = $comment->id;

            
            auth()->user()->comments()->create([
                'content' => $request->content,
                'post_id' => $post->id,
                'parent' => $comment_id 
            ]);   

            session()->flash('success','Comment submitted.');

            return redirect()->route('posts.show',[$forum->url,$post->slug]);


        
      /*   if(isset($request->comment)){

            if($comment = Comment::find($request->comment)->first()){
                auth()->user()->comments()->create([
                    'content' => $request->content,
                    'post_id' => $post->id,
                    'parent' => $comment->id
                ]);
            }
            
            else{
                session()->flash('danger','Cannot find comment.');

                return redirect()->route('posts.show',[$forum->url,$post->slug]);
            }   
            
        }

        
            auth()->user()->comments()->create([
                'content' => $request->content,
                'post_id' => $post->id,
            ]);
        
        
       



        session()->flash('success','Comment submitted.');

        return redirect()->route('posts.show',[$forum->url,$post->slug]); */
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

    public function reply(Forum $forum, Post $post, Comment $comment)
    {
        return view('comments.reply',[
            'forum' => $forum,
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
