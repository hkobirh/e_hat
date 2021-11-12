@extends('frontend.includes.app')

@section('special-css')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/demo1.min.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.min.css')}}">
@endsection

@section('main-content')

           @include('frontend.includes.main-slider')
           @include('frontend.includes.first-container')
           @include('frontend.includes.deals-wraper')
           @include('frontend.includes.top-of-month')
           @include('frontend.includes.mother-container')
@endsection
