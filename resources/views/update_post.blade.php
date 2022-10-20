@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('BLOG') }}</div>

                    <form action="{{route('update_post')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input value="{{$blog_post->title}}" type="text" class="form-control" id="title"
                                   name="title">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content"
                                      rows="3">{{$blog_post->content}}</textarea>
                        </div>

                        <div class="mb-3">
                            <select name="category_id" class="form-select" aria-label="Default select example">
                                <option selected>Select Category</option>
                                @foreach($categories as $category)
                                <option  value="{{$category->category_id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input name="blog_post_id" type="hidden" value="{{$blog_post->blog_post_id}}">
                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
