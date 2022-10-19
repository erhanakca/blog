@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Category</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blog_posts as $post)
                    <tr>
                        <th >{{$post->blog_post_id}}</th>
                        <td>{{$post->title}}</td>
                        <td><a href="{{route('show', ['blog_post_id'=>$post->blog_post_id])}}">{{$post->content}}</a></td>
                        <td>{{$post->category->name}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
