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
                            <th scope="col"><h4>#</h4></th>
                            <th scope="col"><h4>Category</h4></th>
                            <th scope="col"><h4>Actions</h4></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category['category_id']}}</td>
                                <td>{{$category['name']}}</td>
                                <td><a href="{{route('delete_category', ['category_id' => $category -> category_id])}}" class="btn btn-sm btn-danger ">Delete</a>
                                    <a href="{{route('edit_category', ['category_id' => $category -> category_id])}}" class="btn btn-sm btn-warning">Update</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-sm btn-primary me-5" href="{{route('category_add')}}">Category Add</a>
                <a class="btn btn-sm btn-primary" href="{{route('home')}}">Back</a>
            </div>
        </div>
    </div>
    </div>
@endsection
