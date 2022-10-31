@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('BLOG') }}
                    @if($blog_post->likes->where('user_id', auth()->user()->user_id)->first() != null)
                        *
                    @endif
                    </div>

                    <h1>{{$blog_post->title}}</h1>
                    <p>{{$blog_post->content}}</p>
                    <h4>Category: {{$blog_post->category->name}}</h4>
                    <h4>Yazar: {{$blog_post->user->getFullName()}}</h4>
                    <h5>Likes: {{count($blog_post->likes)}} </h5>
                    @foreach($blog_post->likes as $like)
                        <p>{{$like->user->getFullName()}}</p>
                    @endforeach
                    <a href="{{route('home')}}" class="btn btn-sm btn-primary">Geri Dön</a>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
