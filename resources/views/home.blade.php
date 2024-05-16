@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('css')

@endsection


@section('title_page')



@endsection

@section('content')
<br>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" style=";width:900px;margin-right:60px;margin-left:100px" >
        <img src="{{asset('assets/img/slider.jpg')}}" class="d-block w-100" alt="..." >
        <div class="carousel-caption d-none d-md-block" style="margin-bottom: 150px">
            <h1 style="color: black;text-size:bold"><mark style="background-color:bisque">WELCOME</mark></h1>
            <h2 style="color: black;text-size:bold"><mark style="background-color:darksalmon">All you need is a public library card or access through your workplace or university.</mark></h2>
          </div>
      </div>
    </div>
  </div>
<br>
@endsection