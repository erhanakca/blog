<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blogpost;
use App\Models\Category;
use App\Repository\Eloquent\BlogPostRepository;
use App\Repository\Interfaces\BlogPostRepositoryInterface;
use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    private $blogPostRepository;

    public function __construct(BlogPostRepositoryInterface $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    public function show($blog_post_id)
    {
        $blog_post = Blogpost::where('blog_post_id', $blog_post_id)->with('category', 'user', 'likes')->first();
        return view('post_detail', ['blog_post'=>$blog_post]);
    }
    public function delete($blog_post_id)
    {
        Blogpost::find($blog_post_id)->delete();
        $blog_posts = Blogpost::where('user_id', auth()->user()->user_id)->with('category', 'likes')->get();
        return view('home', ['blog_posts'=>$blog_posts]);
    }
    public function edit($blog_post_id)
    {
        $categories = Category::all();
        return view('update_post', ['blog_post'=>$this->blogPostRepository->find($blog_post_id), 'categories'=>$categories]);
    }
    public function update(UpdateBlogPostRequest $request)
    {
        $data = $request->validated();
        Blogpost::find($data['blog_post_id'])->update([
            'title'=>$data['title'],
            'content'=>$data['content'],
            'category_id'=>$data['category_id']
        ]);
        $blog_posts = Blogpost::where('user_id', auth()->user()->user_id)->with('category', 'likes')->get();
        return view('home', ['blog_posts'=>$blog_posts]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('add_post', ['categories'=>$categories]);
    }

    public function create(StoreBlogPostRequest $request)
    {
        $data = $request->validated();
        /*$blog_post = new Blogpost();
        $blog_post->title = $data['title'];
        $blog_post->content = $data['content'];
        $blog_post->category_id = $data['category_id'];
        $blog_post->save();*/

        if ($data['category_id'] == 'Select Category')
        {
            $category = Category::create([
               'name' => $data['manuel_add']
            ]);
            Blogpost::create([
                'title'=> $data['title'],
                'content'=> $data['content'],
                'user_id' => $request->user()->user_id,
                'image_url' => $data['image_url'] ?? null,
                'category_id' => $category->category_id,
            ]);
        }else {
            Blogpost::create([
                'title'=> $data['title'],
                'content'=> $data['content'],
                'user_id' => $request->user()->user_id,
                'image_url' => $data['image_url'] ?? null,
                'category_id' => $data['category_id'],
            ]);
        }
        $blog_posts = Blogpost::where('user_id', auth()->user()->user_id)->with('likes')->get();
        return view('home', ['blog_posts'=>$blog_posts]);
    }



}
