@extends("backend.includes.app")

@section('title', 'Update sliders')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{route('staff.sliders.index')}}" type="button"
                    class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle mr-1"></i> Manage
                    sliders</a>
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
                    <div class="card-title text-center">Slider update form</div>
                    <hr>
                    <form action="{{ route('staff.sliders.update', $data->id) }}" class="slider-update"
                        enctype="multipart/form-data">
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Slider title</label>
                            <input type="text" value="{{ $data->banner_title }}" class="form-control" id="name" name="banner_title">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="background">Background image</label>
                            <input type="file" class="form-control" name="background_image" id="background">
                        </div>
                        <div>
                            <img class="img-thumbnail" src="{{asset('storage/uploads/sliders/'. $data->background_image)}}" alt=""
                                style="width: 100px; height: 50px;">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> Update slider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
