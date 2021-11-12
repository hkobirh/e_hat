@extends("backend.includes.app")

@section("title","Manage users")

@section("main-content")
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Manage user</h4>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{route('staff.users.create')}}" type="button" class="btn btn-primary waves-effect waves-light">
                    <i class="fa fa-plus-circle mr-1"></i> Add user</a>
            </div>
        </div>
    </div>
   <div class="row">
       <div class="col-lg-12">
           <x-alert/>
           <div class="card">
               <div class="card-body">
               <h5 class="card-title">@yield('title')</h5>
              <x-content-filter/>
              <div class="table-responsive" id="dataTable" data-url={{route('staff.users.index')}}>
                  @include('backend.user.users-table')
            </div>
               </div>
           </div>
       </div>
   </div>
@endsection
