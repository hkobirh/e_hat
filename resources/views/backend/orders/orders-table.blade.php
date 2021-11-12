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
                <th scope="col">SL No.</th>
                <th scope="col">Invoice No</th>
                <th scope="col">Order Total</th>
                <th scope="col">Order Date</th>
                <th scope="col">Order Status</th>
                <th scope="col">Payment Type</th>
                <th scope="col">Shipping Type</th>
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
                    <th scope="row">{{ $loop->index + $data->firstItem() }}</th>
                    <th scope="row">{{ $row->id }}</th>
                    <th scope="row">{{ $row->amount }}</th>
                    <th scope="row">{{ date('d/m/y, h:iA',strtotime($row->created_at)) }}</th>
                    <th scope="row"><span class="text-capitalize badge badge-{{order_status($row->order_status)}}">{{ $row->order_status }}</span></th>
                    <th scope="row"><span class="badge badge-{{$row->pay_method == 1 ? 'success':'primary'}}">{{ $row->pay_method == 1 ? 'Cash':'Bcash'}}</span></th>
                    <th scope="row">{{ $row->shipping_type }}</th>

                    <th scope="row" style="display: flex">
                        <a href="{{ route('staff.brands.edit', $row->id) }}" type="button"
                            class="m-1 btn btn-outline-warning waves-effect waves-light btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('orders.view', $row->id) }}" type="button"
                            class="order-view m-1 btn btn-outline-danger waves-effect waves-light btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('orders.invoice', $row->id) }}" type="button" target="_blank"
                           class="order-view m-1 btn btn-outline-primary waves-effect waves-light btn-sm">
                            <i class="fa fa-download"></i>
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
            {{ $data->links() }}
        </div>
    </div>
</div>
