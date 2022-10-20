<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    public function show($blog_post_id)
    {
        $blog_post = Blogpost::where('blog_post_id', $blog_post_id)->with('category', 'user')->first();
        return view('post_detail', ['blog_post'=>$blog_post]);
    }
    public function delete($blog_post_id)
    {
        Blogpost::find($blog_post_id)->delete();
        $blog_posts = Blogpost::where('user_id', auth()->user()->user_id)->with('category')->get();
        return view('home', ['blog_posts'=>$blog_posts]);
    }
    public function edit($blog_post_id)
    {
        $blog_post = Blogpost::find($blog_post_id);
        $categories = Category::all();
        return view('update_post', ['blog_post'=>$blog_post, 'categories'=>$categories]);
    }
    public function update(Request $request)
    {
        $data = $request->all();
        Blogpost::find($data['blog_post_id'])->update([
            'title'=>$data['title'],
            'content'=>$data['content'],
            'category_id'=>$data['category_id']
        ]);
        $blog_posts = Blogpost::where('user_id', auth()->user()->user_id)->with('category')->get();
        return view('home', ['blog_posts'=>$blog_posts]);
    }
}
