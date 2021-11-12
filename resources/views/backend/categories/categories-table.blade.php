<div>
    <table class="table table-bordered dataTable" role="grid" aria-describedby="default-datatable_info">
        <thead>
            <tr>
                <th scope="col">

                    <div class="icheck-material-success icheck-inline">
                        <input name="" type="checkbox" id="checkAll">
                        <label for="checkAll"></label>
                    </div>
                </th>
                <th scope="col">SL No.</th>
                <th scope="col" style="width:100px">Category Name</th>
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
                    <td>
                        <div class="icheck-material-success icheck-inline">
                            <input name="ids[]" value="{{ $row->id }}" type="checkbox" class="item"
                                id="{{ $row->id }}">
                            <label for="{{ $row->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $loop->index + $data->firstItem() }}</td>
                    <td>{{ $row->name }} </td>
                    <td>
                        <input type="checkbox" class="status-toggle" {{ $row->status === 'active' ? 'checked' : '' }}
                            data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="small"
                            data-on="active" data-off="inactive"
                            data-url="{{ route('staff.categories.status.toggle') }}" data-id="{{ $row->id }}">
                    </td>
                    <td>
                        <img class="img-thumbnail"
                            src="{{ asset('backend/uploads/icons/' . ($row->icon ?? 'logo.png')) }}" alt=""
                            style="max-width: 50px; max-height: 60px;">
                    </td>

                    <td style="display: flex">
                        <a href="{{ route('staff.categories.edit', $row->id) }}" type="button"
                            class="m-1 btn btn-outline-warning waves-effect waves-light btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('staff.categories.destroy', $row->id) }}" type="button"
                            class="category-remove m-1 btn btn-outline-danger waves-effect waves-light btn-sm">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>
                 @foreach ($row->sub_cats as $row1)

                <tr>
                    <td>
                        <div class="icheck-material-success icheck-inline">
                            <input name="ids[]" value="{{ $row1->id }}" type="checkbox" class="item"
                                id="{{ $row1->id }}">
                            <label for="{{ $row1->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $loop->index + $data->firstItem() }}</td>
                    <td>{{ $row->name }}>{{ $row1->name }}</td>
                    <td>
                        <input type="checkbox" class="status-toggle" {{ $row1->status === 'active' ? 'checked' : '' }}
                            data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="small"
                            data-on="active" data-off="inactive"
                            data-url="{{ route('staff.categories.status.toggle') }}" data-id="{{ $row1->id }}">
                    </td>
                    <td>
                    </td>

                    <td style="display: flex">
                        <a href="{{ route('staff.categories.edit', $row1->id) }}" type="button"
                            class="m-1 btn btn-outline-warning waves-effect waves-light btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('staff.categories.destroy', $row1->id) }}" type="button"
                            class="category-remove m-1 btn btn-outline-danger waves-effect waves-light btn-sm">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>
                @foreach ($row1->sub_cats as $row2)

                <tr>
                    <td>
                        <div class="icheck-material-success icheck-inline">
                            <input name="ids[]" value="{{ $row2->id }}" type="checkbox" class="item"
                                id="{{ $row2->id }}">
                            <label for="{{ $row2->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $loop->index + $data->firstItem() }}</td>
                    <td>{{ $row->name }}>{{ $row1->name }}>{{ $row2->name }} </td>
                    <td>
                        <input type="checkbox" class="status-toggle" {{ $row2->status === 'active' ? 'checked' : '' }}
                            data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="small"
                            data-on="active" data-off="inactive"
                            data-url="{{ route('staff.categories.status.toggle') }}" data-id="{{ $row2->id }}">
                    </td>
                    <td>
                    </td>

                    <td style="display: flex">
                        <a href="{{ route('staff.categories.edit', $row2->id) }}" type="button"
                            class="m-1 btn btn-outline-warning waves-effect waves-light btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('staff.categories.destroy', $row2->id) }}" type="button"
                            class="category-remove m-1 btn btn-outline-danger waves-effect waves-light btn-sm">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            @endforeach
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <div class="dropdown m-2">
            <button class="btn btn-success dropdown-toggle btn-sm" disabled="" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bluck Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item bluck-action user-pointer text-danger"
                    data-url="{{ route('staff.categories.bluck.action') }}" data-action="delete"><i
                        class="fa fa-trash"></i> Delete</button>
                <button class="dropdown-item bluck-action user-pointer text-info"
                    data-url="{{ route('staff.categories.bluck.action') }}" data-action="active"><i class="fa fa-eye"></i>
                    Active</button>
                <button class="dropdown-item bluck-action user-pointer text-warning"
                    data-url="{{ route('staff.categories.bluck.action') }}" data-action="inactive"><i
                        class="fa fa-user"></i> Inactive</button>
            </div>
        </div>

        <div>
            {{ $data->links() }}
        </div>
    </div>
</div>
