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
                            <th scope="col"><h4>User</h4></th>
                            <th scope="col"><h4>Title</h4></th>
                            <th scope="col"><h4>Content</h4></th>
                            <th scope="col"><h4>Category</h4></th>
                            <th scope="col"><h4>Actions</h4></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blog_posts as $post)
                            <tr>
                                <th>{{$post->user->name}}</th>
                                <th>{{$post->title}}</th>
                                <td>{{$post->content}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>LİKE</td>
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
