<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Blogpostshaslikes;
use Illuminate\Http\Request;

class BlogpostshaslikesController extends Controller
{
    public function like($blog_post_id)
    {
        $user_id = auth()->user()->user_id;
        $check = Blogpostshaslikes::where('user_id', $user_id)
            ->where('blog_post_id', $blog_post_id)
            ->get();

        if ($check->count() > 0)
        {
            return redirect()->route('index');
        }

        Blogpostshaslikes::create([
           'user_id' => $user_id,
           'blog_post_id' => $blog_post_id
        ]);

        return redirect()->route('index');
    }

    public function unlike($blog_post_id)
    {
        $user_id = auth()->user()->user_id;
        $query = Blogpostshaslikes::where('user_id', $user_id)
            ->where('blog_post_id', $blog_post_id);
        $check = $query->get();

        if ($check->count() < 0)
        {
            return redirect()->route('index');
        }

        $query->delete();

        return redirect()->route('index');
    }
}
