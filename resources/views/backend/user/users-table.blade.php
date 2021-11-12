<div class="col-sm-12">
    <table class="table table-bordered dataTable" role="grid" aria-describedby="default-datatable_info">
        <thead>
            {{-- id="default-datatable" --}}
            <tr>
                <th scope="col">
                    <div class="icheck-material-success icheck-inline">
                        <input name="" type="checkbox" class="item" id="checkAll">
                        <label for="checkAll"></label>
                    </div>
                </th>
                <th scope="col">SL No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Photo</th>
                @if(is_permitted('User edit','true'))
                <th scope="col" style="min-width: 50px">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="12" class="text-center"><span style="color: red; font-size:20px">No data found !</span>
                    </td>
                </tr>
            @endif
            @foreach ($data as $user)

                <tr>
                    <th scope="row">

                        <div class="icheck-material-success icheck-inline">
                            <input name="ids[]" value="{{ $user->id }}" type="checkbox" class="item"
                                id="{{ $user->id }}">
                            <label for="{{ $user->id }}"></label>
                        </div>

                    </th>
                    <th scope="row">{{ $loop->index + $data->firstItem() }}</th>
                    <th scope="row">{{ $user->name }}</th>
                    <th scope="row">{{ $user->email }}</th>
                    <th scope="row">
                        <input type="checkbox" class="status-toggle" {{$user->status === 'active'? 'checked':''}} data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="small" data-on="active" data-off="inactive"data-url="{{route('staff.user.status.toggle')}}" data-id="{{$user->id}}">
                    </th>
                    <th scope="row"><img class="img-thumbnail"
                            src="{{ asset('storage/uploads/users/' . $user->photo) }}" alt=""
                            style="max-width: 50px; max-height: 60px;">
                    </th>
                    @if(is_permitted('User edit','true'))
                    <th scope="row" style="display: flex">
                        <a href="{{ route('staff.users.edit', $user->id) }}" type="button"
                            class="m-1 btn btn-outline-warning waves-effect waves-light btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('staff.users.destroy', $user->id) }}" type="button"
                            class="user-remove m-1 btn btn-outline-danger waves-effect waves-light btn-sm">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </th>
                    @endif
                </tr>
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
                    data-url="{{ route('staff.user.bluck.action') }}" data-action="delete"><i
                        class="fa fa-trash"></i> Delete</button>
                <button class="dropdown-item bluck-action user-pointer text-info"
                    data-url="{{ route('staff.user.bluck.action') }}" data-action="active"><i class="fa fa-eye"></i>
                    Active</button>
                <button class="dropdown-item bluck-action user-pointer text-warning"
                    data-url="{{ route('staff.user.bluck.action') }}" data-action="inactive"><i
                        class="fa fa-user"></i> Inactive</button>
            </div>
        </div>

        <div>
            {{ $data->links() }}
        </div>
    </div>
</div>
