@extends("users.layout")
@section("load")
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ trans('message.success') }}
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-success" role="alert">
                {{ trans('message.update') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-success" role="alert">
                {{ trans('message.delete') }}
            </div>
        @endif
        <h1 style="text-align: center;">List Users</h1>
        <div style="margin-bottom:5px;">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add user</a>
        </div>
        <div class="panel panel-primary">
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr style="text-align: center;">
                        <th>STT</th>
                        <th>Địa chỉ email</th>
                        <th>Tên</th>
                        <th>Địa chỉ:</th>
                        <th>Số điện thoại</th>
                    </tr>
                    @foreach ($data as $rows)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $rows->mail_address }}</td>
                        <td>{{ $rows->name }}</td>
                        <td>{{ $rows->address }}</td>
                        <td>{{ $rows->phone }}</td>
                        <td style="text-align:center;">
                        <a href="{{ route('users.show', $rows->id) }}">Update</a>&nbsp;
                        <a href="{{ route('users.destroy', $rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                </table>
                <!-- ham render su dung de phan trang -->
                {{ $data -> render() }}
            </div>
        </div>
    </div>
@endsection