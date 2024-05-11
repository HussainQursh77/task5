@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <a href="{{route('parent.index')}}">parent category</a>
                    <a href="{{route('category.index')}}">category</a>
                    <a href="{{route('book.index')}}">library</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
