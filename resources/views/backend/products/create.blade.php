@extends("backend.includes.app")

@section('title', 'Create product')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{ route('staff.brands.index') }}" type="button"
                    class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle mr-1"></i> Manage
                    product</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 offset-1">
            <div>
                <x-alert />
            </div>
            <div class="card">

                <div class="card-body">
                    <div class="card-title text-center">Product create form</div>
                    <hr>
                    <form action="{{ route('staff.products.store') }}" method="POST" class="product-create"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name"
                                placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <select class="form-control single-select" name="brand" id="brand">
                                <option value="1">No Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control single-select" name="category" id="category">
                                {!! category_option($categories, 3, '', true) !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" value="{{ old('model') }}" class="form-control" id="model" name="model"
                                placeholder="Model">
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="text" value="{{ old('model') }}" class="form-control" id="price" name="price"
                                    placeholder="Price">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="off_price">Offer Price</label>
                                <input type="text" value="{{ old('off_price') }}" class="form-control" id="off_price"
                                    name="off_price" placeholder="Offer price">
                            </div>
                        </div>

                        <div id="dateragne-picker" class="off-date">
                            <label for="off_date">Offer date</label>
                            <div class="input-daterange input-group">
                                <input type="text" class="form-control" name="off_date_start" id="off_date"
                                    placeholder="From">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-space-shuttle"></i></span>
                                </div>
                                <input type="text" class="form-control" name="off_date_end" id="off_date" placeholder="To">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="text" value="{{ old('quantity') }}" class="form-control" id="quantity"
                                    name="quantity" placeholder="Quantity">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sku_code">Sku Code</label>
                                <input type="text" value="{{ old('sku_code') }}" class="form-control" id="sku_code"
                                    name="sku_code" placeholder="Sku Code">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Warrenty</label>
                                <br>
                                <span class="m-2 icheck-material-success">
                                    <input type="radio" id="w_yes" class="warr-con" name="warranty" value="1">
                                    <label for="w_yes">Yes</label>
                                </span>
                                <span class="m-2 icheck-material-danger">
                                    <input type="radio" id="w_no" class="warr-con" name="warranty" value="0" checked="">
                                    <label for="w_no">No</label>
                                </span>
                            </div>

                            <div class="form-group col-md-6 warr-section">
                                <label for="sku_code">Warrenty Duration</label>
                                <input type="text" value="{{ old('warrenty_duration') }}" class="form-control"
                                    id="warrenty_duration" name="warrenty_duration" placeholder="Warrenty duration">
                            </div>
                        </div>

                        <div class="form-group warr-section">
                            <label for="">Warrenty Condition</label>
                            <textarea name="warrenty_conditions" class="textEditor" id="textEditor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="textEditor" id="textEdit" cols="30" rows="10"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 user-pointer">
                                <div class="form-group">
                                    <label for="">Thumbnail</label>
                                    <div class="thumbnail"></div>
                                </div>
                            </div>
                            <div class="col-md-6 user-pointer">
                                <div class="form-group">
                                    <label for="">Gallery</label>
                                    <div class="gallery"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group inline-flex text-center">
                            <span class="m-2">
                                <input type="radio" id="active" name="status" value="active" checked="">
                                <label for="active">Active</label>
                            </span>
                            <span class="m-2">
                                <input type="radio" id="inactive" name="status" value="inactive">
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
@section('js')
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/summernote/dist/summernote-bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/uploader/src/image-uploader.css') }}" />
    <script src="{{ asset('backend/assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/uploader/src/image-uploader.js') }}"></script>

    <style>
        .off-date,
        .warr-section {
            display: none;
        }

    </style>
    <script>
        $(document).on('keyup', '#off_price', function() {
            if ($(this).val() > 0) {
                $('.off-date').slideDown(500)
            } else {
                $('.off-date').slideUp(500)
            }
        })

        $(document).on('change', '.warr-con', function() {
            if ($(this).val() > 0) {
                $('.warr-section').slideDown(500)
            } else {
                $('.warr-section').slideUp(500)
            }
        })

        $('.thumbnail').imageUploader({
            label: 'Select a thumbnail',
            imagesInputName: 'thumbnail',
            maxFiles: 1,
        });

        $('.gallery').imageUploader({
            label: 'Select images of gallery',
            imagesInputName: 'gallery',
            maxFiles: 4,
        });
        $("select").closest("form").on("reset", function(ev) {
            var targetJQForm = $(ev.target);
            setTimeout((function() {
                this.find("select").trigger("change");
            }).bind(targetJQForm), 0);
        });
    </script>
@endsection
