@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'Menu', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('menu.create') }}" class="btn btn-primary float-right m-2" type="submit">Add</a>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Tên menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <th scope="row">{{ $menu->id }}</th>
                                        <td>{{ $menu->name }}</td>
                                        <td>
                                            <a class="btn btn-default"
                                                href="{{ route('menu.edit', ['id' => $menu->id]) }}">Sửa</a>
                                            <a href="{{ route('menu.delete', ['id' => $menu->id]) }}"
                                                class="btn btn-danger">Xóa</a>
                                            {{-- <a data-target="#modal-confirm" data-toggle="modal" type="button"
                                                class="btn btn-danger">Xóa</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mx-auto">
                        {{ $menus->links('pagination::bootstrap-4') }}
                    </div>
                    <div class="modal fade" id="modal-confirm" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn chắc chắn muốn xóa sản phẩm ?
                                </div>
                                <div class="modal-footer">
                                    <a type="button" id="btn-delete-product" class="btn btn-danger">Xóa</a>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
