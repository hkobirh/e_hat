@extends('frontend.includes.app')
@section('special-css')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.min.css')}}">
@endsection

@section('main-content')
    <div class="container">
        <section class="contact-section">
            <div class="row gutter-lg pb-3 mt-5">
                <x-alert/>
                <x-auth-validation-errors/>
                <div class="col-lg-6">
                    <h4 class="title mb-3">Register</h4>
                    <form class="form contact-us-form" action="{{route('register')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email_1">Email</label>
                            <input type="email" id="email_1" name="email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" value="{{old('mobile')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-dark btn-rounded">Register</button>
                    </form>
                </div>

                <div class="col-lg-6">
                    <h4 class="title mb-3">Login</h4>
                    <form class="form contact-us-form" action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" id="email" name="username" class="form-control"
                                   value="{{old('username')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-dark btn-rounded">Login</button>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection


