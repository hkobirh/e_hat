@extends("backend.includes.app")

@section("title","Create user")

@section("main-content")
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Create user</h4>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{route('staff.users.index')}}" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle mr-1"></i> Manage user</a>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-8 offset-2">
                <div>
                    @if(session('success'))
<div class="alert-success form-control mb-3 text-center">
    {{ session('success')  }}
</div>
@endif
@if(session('error'))
<div class="alert-danger form-control mb-3 text-center">
    {{ session('error')  }}
</div>
@endif
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">User registration Form</div>
                        <hr>
                        <form action="{{ route('staff.users.store') }}" method="POST" class="user-create" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                <span class="text-danger">
                                    @error('name')
                                {{$message}}
                                @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="Enter Your Email Address">
                                <span class="text-danger">
                                    @error('email')
                                {{$message}}
                                @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="mobile" value="{{ old('mobile') }}" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile Number">
                                <span class="text-danger">
                                    @error('mobile')
                                {{$message}}
                                @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                <span class="text-danger">
                                    @error('password')
                                {{$message}}
                                @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmation" name="password_confirmation" placeholder="Confirm Password">
                                <span class="text-danger">
                                    @error('password_confirmation')
                                {{$message}}
                                @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="img-3">Photo</label>
                                <input type="file" name="photo" class="form-control" id="img-3">
                            </div>

                            <div class="form-group">
                                <label for="">Permission</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="icheck-material-success icheck-inline">
                                                <input name="permission[]" value="*" type="checkbox" id="checkAll">
                                            <label for="checkAll">Check all</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach(permission() as $key => $value)
                                    <div class="col-md-3">
                                        <div class="icheck-material-success icheck-inline">
                                                <input name="permission[]" value="{{$key}}" type="checkbox" class="item" id="success{{$key}}">
                                            <label for="success{{$key}}">{{$value}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="form-group inline-flex text-center">
                               <span class="m-2">
                                    <input type="radio" id="active" name="status"  value="active"  checked="">
                                    <label for="active">Active</label>
                               </span>
                              <span class="m-2">
                                    <input type="radio" id="inactive" name="status" value="inactive">
                                    <label for="inactive">Inactive</label>
                              </span>
                            </div>

                            <div class="form-group py-2">
                                <div class="icheck-material-primary">
                                    <input type="checkbox" id="user-checkbox1" checked="">
                                    <label for="user-checkbox1">I Agree Terms &amp; Conditions</label>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
