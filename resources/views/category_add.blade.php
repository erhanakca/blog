@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('BLOG') }}</div>

                    <form class="mb-3" action="{{route('category_creat')}}" method="post">
                        @csrf

                        <input class="form-control" id="name" type="text" name="name">

                        <button class="btn btn-sm btn-primary mt-2" type="submit">Add</button>
                        <a class="btn btn-sm btn-primary mt-2" href="">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
