@extends('layouts.admin')

@section('title')
    <title>Danh sách sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\product\product.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'Product', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('product.create') }}" class="btn btn-primary float-right m-2"
                            type="submit">Add</a>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productsData as $productItem)
                                    {{-- {{ dd($productItem->InsertCategoryComment->name) }} --}}
                                    <tr>
                                        <th scope="row">{{ $productItem->id }}</th>
                                        <td>{{ $productItem->name }}</td>
                                        <td>{{ number_format($productItem->price) }}</td>
                                        <td>
                                            <img class="imageProduct" src="{{ asset('$productItem->feature_image_path') }}"
                                                alt="">
                                        </td>
                                        <td>{{ $productItem->InsertCategoryComment->name ?? 'None' }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                                                class="btn btn-default">Sửa</a>
                                            <a href="{{ route('product.delete', ['id' => $productItem->id]) }}"
                                                data-url="{{ route('product.delete', ['id' => $productItem->id]) }}""
                                                        class="  btn btn-danger accessDel">Xóa</a>
                                            {{-- <a data-target="#modal-confirm" data-id="{{ $productItem->id }}"
                                                data-toggle="modal" type="button" class="btn btn-danger">Xóa</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mx-auto">
                        {{ $productsData->links('pagination::bootstrap-4') }}
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
@section('js')
    <script src="{{ asset('admins\product\index.js') }}"></script>
    <script src="{{ asset('vendors\sweetalert\sweetalert2@11.js') }}"></script>
@endsection
