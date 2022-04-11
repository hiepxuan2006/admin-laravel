@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'Category', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary float-right m-2"
                            type="submit">Add</a>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category['id'] }}</th>
                                        <td>{{ $category['name'] }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                class="btn btn-default">Sửa</a>
                                            <a data-url="{{ route('categories.delete', ['id' => $category->id]) }}"
                                                class="btn btn-danger accessDel">Xóa</a>
                                            {{-- <a data-target="#modal-confirm" data-id="{{ $category->id }}"
                                                data-toggle="modal" type="button" class="btn btn-danger accessDe">Xóa</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mx-auto">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('admins\user\index.js') }}"></script>
    <script src="{{ asset('vendors\sweetalert\sweetalert2@11.js') }}"></script>
@endsection
