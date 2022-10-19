<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    public function show($blog_post_id)
    {
        $blog_post = Blogpost::where('blog_post_id', $blog_post_id);
    }
}
