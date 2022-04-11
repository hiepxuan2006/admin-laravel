@extends('layouts.admin')

@section('title')
    <title>Danh sách taif khoản</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\product\product.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'User ', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('user.create') }}" class="btn btn-primary float-right m-2" type="submit">Add</a>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a class="btn btn-default"
                                                href="{{ route('user.edit', ['id' => $user->id]) }}">Sửa</a>
                                            <a data-url="{{ route('user.delete', ['id' => $user->id]) }}"
                                                class="btn btn-danger accessDel">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mx-auto">
                        {{-- {{ $menus->links('pagination::bootstrap-4') }} --}}
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
