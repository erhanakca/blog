@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('BLOG') }}</div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><h4>Title</h4></th>
                        <th scope="col"><h4>Content</h4></th>
                        <th scope="col"><h4>Category</h4></th>
                        <th scope="col"><h4>Actions</h4></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blog_posts as $post)
                    <tr>
                        <th >{{$post->blog_post_id}}</th>
                        <td>{{$post->title}}</td>
                        <td><a href="{{route('show', ['blog_post_id'=>$post->blog_post_id])}}">{{$post->content}}</a></td>
                        <td>{{$post->category->name}}</td>
                        <td><a href="{{route('delete_post', ['blog_post_id'=>$post->blog_post_id])}}" class="btn btn-sm btn-danger mb-1">Delete</a>
                            <a href="{{route('edit_post', ['blog_post_id'=>$post->blog_post_id])}}" class="btn btn-sm btn-warning">Update</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            <a class="btn btn-sm btn-primary" href="{{route('add_post')}}">Post Add</a>
            <a class="btn btn-sm btn-primary" href="{{route('category_show')}}">Categories</a>
            </div>
        </div>
    </div>
</div>
@endsection
