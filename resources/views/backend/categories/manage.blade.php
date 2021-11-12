@extends("backend.includes.app")

@section('title', 'Manage categories')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{ route('staff.categories.create') }}" type="button"
                    class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-circle mr-1"></i> Add category</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <x-alert />
            <div class="card">
                <div class="card-body">
                    <x-content-filter/>
                    <div class="table-responsive" id="dataTable" data-url={{ route('staff.categories.index') }}>
                        @include('backend.categories.categories-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
