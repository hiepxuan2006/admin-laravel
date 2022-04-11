@extends('layouts.admin')

@section('title')
    <title>Danh sách slider</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\product\product.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'Slider', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-primary float-right m-2"
                            type="submit">Add</a>
                    </div>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Tên slider</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{ $slider->id }}</th>
                                        <td>{{ $slider->name }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td><img class="imageProduct" src="{{ route('$slider->image_path') }}" alt=""></td>
                                        <td>
                                            <a href="{{ route('slider.edit', ['id' => $slider->id]) }}"
                                                class="btn btn-default" href="">Sửa</a>
                                            <a data-url="{{ route('slider.delete', ['id' => $slider->id]) }}"
                                                class="btn btn-danger accessDel">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mx-auto">
                        {{ $sliders->links('pagination::bootstrap-4') }}
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
