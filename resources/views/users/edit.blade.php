@extends("users.layout")
@section("load")
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">EditUser</h2>
            </div>
        </div>
        <form action="{{ route('users.edit', $record->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control{{($errors->first('name') ? " form-error" : "")}}" name="name" placeholder="Tên từ 6-200 kí tự" value="<?php echo isset($record->name) ? $record->name : '' ?>">
                    @error('name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mail_address">Email:</label>
                    <input type="email" class="form-control{{($errors->first('mail_address') ? " form-error" : "")}}" name="mail_address" value="<?php echo isset($record->mail_address) ? $record-> mail_address : '' ?>" @if(isset($record->mail_address)) disabled @endif >
                    @error('mail_address')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control{{($errors->first('password') ? " form-error" : "")}}" name="password" @if(isset($record -> mail_address)) placeholder="Không đổi password thì không nhập thông tin vào ô này" @endif>
                    @error('password')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_comfirm">Confirmation password:</label>
                    <input type="password" class="form-control{{($errors->first('password_comfirm') ? " form-error" : "")}}" name="password_comfirm"  @if(isset($record->mail_address)) placeholder="Không đổi password thì không nhập thông tin vào ô này" @endif>
                    @error('password_comfirm')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control{{($errors->first('phone') ? " form-error" : "")}}" name="phone" id="phone" value="<?php echo isset($record->phone) ? $record->phone : '' ?>" >
                    @error('phone')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control{{($errors->first('address') ? " form-error" : "")}}" name="address" id="address" value="<?php echo isset($record->address) ? $record -> address : '' ?>" >
                    @error('address')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-success" name="addUsers" type="submit">Edit Users</button>
                <button class="btn btn-success" name="Users" type="submit"><a style="color: white; text-decoration: none;" href="{{ route('users.index') }}">Users</a></button>
            </div>
        </form>
    </div>
@endsection
