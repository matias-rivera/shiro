<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('servers',Server::orderByVisits()->get())
        ->with('posts',Post::take(50)->orderByVisits()->get());
    }
}
