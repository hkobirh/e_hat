<div>
    <table class="table table-bordered dataTable" role="grid" aria-describedby="default-datatable_info">
        <thead>
            {{-- id="default-datatable" --}}
            <tr>
                <th scope="col">

                    <div class="icheck-material-success icheck-inline">
                        <input name="" type="checkbox" id="checkAll">
                        <label for="checkAll"></label>
                    </div>
                </th>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Price</th>
                <th scope="col">Off Price</th>
                <th scope="col">Off Date</th>
                <th scope="col">SKU Code</th>
                <th scope="col">Featured</th>
                <th scope="col">Status</th>
                <th scope="col">Icon</th>
                <th scope="col" style="min-width: 50px">Action</th>
            </tr>
        </thead>
        <tbody>


            @if ($data->isEmpty())
                <tr>
                    <td colspan="12" class="text-center"><span style="color: red; font-size:20px">No data found
                            !</span></td>
                </tr>
            @endif
            @foreach ($data as $row)

                <tr>
                    <th scope="row">
                        <div class="icheck-material-success icheck-inline">
                            <input name="ids[]" value="{{ $row->id }}" type="checkbox" class="item"
                                id="{{ $row->id }}">
                            <label for="{{ $row->id }}"></label>
                        </div>
                    </th>
                    <th scope="row"><img class="img-thumbnail"
                        src="{{ asset('backend/assets/images/avatars/' . ($row->icon ? $row->icon : 'avatar-1.png')) }}"
                        alt="" style="max-width: 50px; max-height: 60px;"></th>

                        <th scope="row">{{ substr($row->name,0,15) }}...</th>

                    <th scope="row">
                        <input type="checkbox" class="status-toggle" {{$row->status === 'active'? 'checked':''}} data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="small" data-on="active" data-off="inactive"data-url="{{route('staff.brand.status.toggle')}}" data-id="{{$row->id}}">
                    </th>
                    <th scope="row" style="display: flex">
                        <a href="{{ route('staff.brands.edit', $row->id) }}" type="button"
                            class="m-1 btn btn-outline-warning waves-effect waves-light btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('staff.brands.destroy', $row->id) }}" type="button"
                            class="brand-remove m-1 btn btn-outline-danger waves-effect waves-light btn-sm">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <div class="dropdown m-2">
            <button class="btn btn-success dropdown-toggle btn-sm action-enable" disabled="" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bluck Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item bluck-action user-pointer text-danger"
                    data-url="{{ route('staff.brand.bluck.action') }}" data-action="delete"><i
                        class="fa fa-trash"></i> Delete</button>
                <button class="dropdown-item bluck-action user-pointer text-info"
                    data-url="{{ route('staff.brand.bluck.action') }}" data-action="active"><i class="fa fa-eye"></i>
                    Active</button>
                <button class="dropdown-item bluck-action user-pointer text-warning"
                    data-url="{{ route('staff.brand.bluck.action') }}" data-action="inactive"><i
                        class="fa fa-user"></i> Inactive</button>
            </div>
        </div>

        <div>
            {{-- {{ $data->links() }} --}}
        </div>
    </div>
</div>
