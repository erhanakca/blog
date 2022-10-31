<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\exception_for;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $blog_posts = Blogpost::where('user_id', auth()->user()->user_id)
            ->with('category', 'likes')
            ->get();
        return view('home', ['blog_posts' => $blog_posts]);
    }

    public function index()
    {
        $blog_posts = Blogpost::where('user_id', '!=', auth()->user()->user_id)
            ->with('category', 'user', 'likes')
            ->get();
        return view('index', ['blog_posts' => $blog_posts]);
    }
}



