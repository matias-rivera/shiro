<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Server;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index',[
        ]);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',[
            'user' => $user,
            'servers' => Server::orderByVisits()->get(),
            'posts' => Post::take(50)->orderByVisits()->get()
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
    public function update(UpdateUserRequest $request, User $user)
    {

        
        $data = $request->only(['name','bio','twitter','facebook','website','instagram']);
        auth()->user()->update($data);

        return redirect()->route('users.index');
        //
    }


    public function notifications(){

     
        auth()->user()->unreadNotifications->markAsRead();

        return view('users.notifications',[
            'notifications' => auth()->user()->notifications()->paginate(5)
        ]);
    }

    public function posts(){

    
        return view('users.posts');
    }

    public function comments(){

    
        return view('users.comments');
    }

    public function profile(){
    
        return view('users.profile');
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
