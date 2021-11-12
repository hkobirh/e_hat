@extends("backend.includes.app")

@section('title', 'Update brand')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{ route('staff.brands.index') }}" type="button"
                    class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle mr-1"></i> Manage
                    brands</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-2">
            <div>
                <x-alert/>
            </div>
            <div class="card">

                <div class="card-body">
                    <div class="card-title text-center">Brand update form</div>
                    <hr>
                    <form action="{{ route('staff.brands.update', $brand->id) }}" class="brand-update" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $brand->name }}" class="form-control" id="name" name="name">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input type="text" value="{{ $brand->slug }}" class="form-control" id="slug" name="slug">
                            <span class="text-danger">
                                @error('slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="name">Icon</label>
                            <input type="file" class="form-control" name="icon">
                        </div>
                        <div>
                            <img class="img-thumbnail" src="{{ asset('backend/uploads/icons/' . $brand->icon) }}" alt=""
                                style="max-width: 50px; max-height: 60px;">
                        </div>

                        <div class="form-group inline-flex text-center">
                            <span class="m-2">
                                <input type="radio" id="active" name="status" value="active" {{$brand->status == 'active' ?'checked':''}}>
                                <label for="active">Active</label>
                            </span>
                            <span class="m-2">
                                <input type="radio" id="inactive" name="status" value="inactive" {{$brand->status == 'inactive' ?'checked':''}}>
                                <label for="inactive">Inactive</label>
                            </span>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
