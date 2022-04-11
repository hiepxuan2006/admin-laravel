@extends('layouts.admin')

@section('title')
    <title>Thêm tài khoản</title>
@endsection
@section('css')
    <link href="{{ asset('vendors\select2\select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins\product\product.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'User', 'key' => 'addUser'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tài khoản</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="nhập tên tài khoản" value="{{ $user->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="nhập email" value="{{ $user->email }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập mật khẩu</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="nhập mật khẩu" value="{{ old('password') }}">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Vai trò</label>
                                <select multiple class="form-control tags_select_choose" name="role_id[]">
                                    <option value=""></option>
                                    {{-- {!! $htmlOption !!} --}}
                                    @foreach ($roles as $role)
                                        <option {{ $roleUser->Contains('id', $role->id) ? 'selected' : '' }}
                                            value="{{ $role->id }}">
                                            {{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Cập nhật thông tin</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="{{ asset('vendors\select2\select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".tags_select_choose").select2({
                'placeholder': 'Chọn vai trò'
            })

        });
    </script>
@endsection
