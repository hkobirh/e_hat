@extends("backend.includes.app")

@section('title', 'Manage slider')

@section('main-content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <x-alert/>
            <div class="card">
                <div class="card-body">
                    <x-content-filter/>
                    <div class="table-responsive" id="dataTable">
                        <div>
                            <table class="table table-bordered dataTable" role="grid"
                                   aria-describedby="default-datatable_info">
                                <thead>
                                {{-- id="default-datatable" --}}
                                <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Banner title</th>
                                    <th scope="col">Background image</th>
                                    <th scope="col" style="min-width: 50px">Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @if ($data->isEmpty())
                                    <tr>
                                        <td colspan="12" class="text-center"><span style="color: red; font-size:20px">No data foun!</span></td>
                                    </tr>
                                @endif
                                @foreach ($data as $row)

                                    <tr>
                                        <th scope="row">{{ $loop->index }}</th>
                                        <th scope="row">{{ $row->banner_title }}</th>
                                        <th scope="row">
                                            <img class="img-thumbnail"
                                                             src="{{ asset('storage/uploads/sliders/'.$row->background_image) }}"
                                                             alt="" style="max-width: 50px; max-height: 60px;">
                                        </th>
                                         <th>
                                             <a href="{{ route('staff.sliders.edit', $row->id) }}" type="button"
                                           class="m-1 btn btn-outline-warning waves-effect waves-light btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
