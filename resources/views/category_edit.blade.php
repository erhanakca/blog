@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('BLOG') }}</div>

                    <form class="mb-3" action="{{route('update_category')}}" method="post">
                        @csrf

                        <input value="{{$category->name}}" class="form-control" id="name" type="text" name="name">
                        <input value="{{$category->category_id}}" name="category_id" type="hidden" >

                        <button class="btn btn-sm btn-primary mt-2" type="submit">Edit</button>
                        <a class="btn btn-sm btn-primary mt-2" href="{{route('category_show')}}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
