
@extends('frontend.includes.app')
@section('special-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.min.css') }}">
@endsection

@section('main-content')

   <div class="container">
       <div class="row mt-4 p-4 justify-content-center">
           <div class="col-md-6">
               @if($order === null)
                   <form action="{{route('track.order')}}" method="post">
                       @csrf
                       <input class="form-control" type="text" name="order_id">
                       <div class="text-right mt-2">
                           <button type="submit" class="btn btn-primary">Search</button>
                       </div>
                   </form>
               @else
               <p>Welcome to our track page</p>
                   <h1>
                       {{$order->order_status}}
                   </h1>
                   <span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, laudantium.</span>
               @endif
           </div>
       </div>
   </div>
@endsection
