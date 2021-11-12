@extends("backend.includes.app")

@section('title', 'Manage product reviews')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <x-alert />
            <div class="card">
                <div class="card-body">
                    <x-content-filter/>
                    <div class="table-responsive" id="dataTable" data-url={{ route('staff.product.reviews') }}>
                        @include('backend.reviews.reviews-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
