<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;

class ServersController extends Controller
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
        return view('/home');
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
    public function show(Server $server)
    {
        $server->increment('visits');
        return view('servers.show',[
            'server' => $server
        ]);
    }


    public function subscribe(Server $server)
    {
        /* Unsubscribed If auth user is already subscribed to the server */
        if(auth()->user()->alreadySubscribed($server->id)){
            auth()->user()->servers()->detach($server->id);
        }

        /* otherwise it will subscribe to the server */
        else{
            auth()->user()->servers()->attach($server->id);
        }
        return redirect()->back();

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
