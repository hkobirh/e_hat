@extends("backend.includes.app")

@section('title', 'Manage orders')

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
                    <div class="table-responsive" id="dataTable" data-url={{ route('orders.index') }}>
                        @include('backend.orders.orders-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
