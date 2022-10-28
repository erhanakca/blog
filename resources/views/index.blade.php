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

                                @if($post->likes->where('user_id', auth()->user()->user_id)->first() != null)
                                    <td><a href="{{route('unlike', ['blog_post_id' => $post->blog_post_id])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        </a></td>
                                @else

                                    <td><a href="{{route('like', ['blog_post_id' => $post->blog_post_id])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                            </svg>
                                        </a></td>
                                @endif


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('home')}}" class="btn btn-sm btn-primary">HOME</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
