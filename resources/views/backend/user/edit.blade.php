@extends("backend.includes.app")

@section('title', 'Update user')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{ route('staff.users.index') }}" type="button"
                    class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle mr-1"></i> Manage user</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-2">
            <div>
                <x-alert />
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center">@yield('title')</div>
                    <hr>
                    <form action="{{ route('staff.users.update', $user->id) }}" method="POST" class="user-update"
                        enctype="multipart/form-data">
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="mobile" value="{{ $user->mobile }}" class="form-control" id="mobile"
                                name="mobile">
                            <span class="text-danger">
                                @error('mobile')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="img-3">Photo</label>
                            <input type="file" value="{{ $user->photo }}" name="photo" class="form-control" id="img-3">
                            <br>
                            <img class="img-thumbnail" src="{{ asset('backend/uploads/users/' . $user->photo) }}" alt=""
                                style="max-height: 60px; max-width: 50px;">
                        </div>

                        <div class="form-group">
                            <label for="">Permission</label>
                            @php($permission = json_decode($user->permission))
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="icheck-material-success icheck-inline">
                                        <input name="permission[]"
                                            {{ count(permission()) === count($permission) || $permission[0] === '*' ? 'checked' : '' }}
                                            type="checkbox" id="checkAll">
                                        <label for="checkAll">Check all</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach (permission() as $key => $value)
                                    <div class="col-md-3">
                                        <div class="icheck-material-success icheck-inline">
                                            @if ($permission[0] === '*')
                                                <input name="permission[]" checked="" value="{{ $key }}"
                                                    type="checkbox" class="item" id="success{{ $key }}">
                                            @else
                                                @if (in_array($key, $permission))
                                                    <input name="permission[]" checked="" value="{{ $key }}"
                                                        type="checkbox" class="item" id="success{{ $key }}">
                                                @else
                                                    <input name="permission[]" value="{{ $key }}" type="checkbox"
                                                        class="item" id="success{{ $key }}">
                                                @endif
                                            @endif
                                            <label for="success{{ $key }}">{{ $value }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group inline-flex text-center">
                            <span class="m-2">
                                <input type="radio" id="active" name="status" value="active"
                                    {{ $user->status === 'active' ? 'checked' : '' }}>
                                <label for="active">Active</label>
                            </span>
                            <span class="m-2">
                                <input type="radio" id="inactive" name="status" value="inactive"
                                    {{ $user->status === 'inactive' ? 'checked' : '' }}>
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
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
