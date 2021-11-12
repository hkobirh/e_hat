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
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Review</th>
                <th scope="col">Status</th>
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

                        <th scope="row">{{$row->customer_id}}</th>
                        <th scope="row">{{$row->product_id}}</th>
                        <th scope="row">{{ substr($row->message,0,25) }}...</th>

                    <th scope="row">
                        <input type="checkbox" class="status-toggle" {{$row->status === 'success'? 'checked':''}} data-toggle="toggle"
                               data-onstyle="success" data-offstyle="danger" data-size="small" data-on="success" data-off="pending"
                               data-url="{{route('staff.brand.status.toggle')}}" data-id="{{$row->id}}">
                    </th>
                    <th scope="row" style="display: flex">
                        <a href="{{ route('staff.brands.edit', $row->id) }}" type="button"
                            class="m-1 btn btn-outline-warning waves-effect waves-light btn-sm">
                            <i class="fa fa-eye"></i>
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
