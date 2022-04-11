@extends('layouts.admin')

@section('title')
    <title>Thêm Menu</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Menu', 'key' => 'addMenu'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{ route('permission.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên modul</label>
                                <input type="text" class="form-control" name="modul_parent" placeholder="nhập tên menu">
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="checkbox" value="List" name="modul_children[]" id="">
                                    <label for="">list</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="checkbox" value="add" name="modul_children[]" id="">
                                    <label for="">Thêm</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="checkbox" value="edit" name="modul_children[]" id="">
                                    <label for="">sửa</label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="checkbox" value="delete" name="modul_children[]" id="">
                                    <label for="">xóa</label>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Thêm Menu</button>
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
