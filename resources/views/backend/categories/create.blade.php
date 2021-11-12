@extends("backend.includes.app")

@section('title', 'Create category')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{ route('staff.categories.index') }}" type="button"
                    class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle mr-1"></i> Manage
                    category</a>
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
                    <div class="card-title text-center">Category create form</div>
                    <form action="{{ route('staff.categories.store') }}" method="POST" class="category-create"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="root">Root category</label>
                            <select class="form-control" name="root" id="root">
                                <option value="0">__Root__</option>
                                {!! category_option($data) !!}
                            </select>
                            <span class="text-danger">
                                @error('root')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="icon-banner-box">
                            <div class="d-flex justify-items-end">
                                <div class="form-group mr-1">
                                    <label for="icon">Icon</label>
                                    <input type="file" class="form-control" name="icon">
                                </div>
                                <div class="form-group ml-1">
                                    <label for="banner">Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                            </div>
                        </div>

                        <div class="form-group inline-flex text-center">
                            <span class="m-2">
                                <input type="radio" value="active" id="active" name="status" checked>
                                <label for="active">Active</label>
                            </span>
                            <span class="m-2">
                                <input type="radio" value="inactive" id="inactive" name="status">
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
