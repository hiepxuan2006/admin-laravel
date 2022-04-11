@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa vai trò</title>
@endsection
@section('css')
    <link href="{{ asset('admins\product\product.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Role', 'key' => 'editRole'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form class="col-sm-12" action="{{ route('role.update', ['id' => $roleEdit->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="col-sm-12">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vai trò</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="nhập vai trò" value="{{ $roleEdit->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả Vai trò</label>
                                <textarea type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name"
                                    placeholder="nhập mô tả vai trò">{{ $roleEdit->display_name }}</textarea>
                                @error('display_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                @foreach ($permissonParents as $permissonParentsItem)
                                    <div class="card border-success mb-3 col-sm-12">
                                        <div class="card-header bg-success bg-transparent border-success">
                                            <input class="checkbox_parent" type="checkbox" name="" id="">
                                            <label>{{ $permissonParentsItem->name }}</label>
                                        </div>
                                        <div class="row">
                                            @foreach ($permissonParentsItem->PermissionChildrenComment as $item)
                                                <div class="col-sm-3">
                                                    <div class="d-flex align-items-center  card-body text-success">
                                                        <input
                                                            {{ $roleEdit->PermissionRoleComment->Contains('id', $item->id) ? 'checked' : '' }}
                                                            class="checkbox_children" type="checkbox"
                                                            value="{{ $item->id }}" name="permission_id[]" id="">
                                                        <label class="card-title">{{ $item->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Thêm slider</button>

                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="{{ asset('admins\role\role.js') }}"></script>
@endsection
