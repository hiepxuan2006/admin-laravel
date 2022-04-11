@extends('layouts.admin')

@section('title')
    <title>Thêm sản phẩm</title>
@endsection
@section('css')
    <link href="{{ asset('vendors\select2\select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins\product\product.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'Product', 'key' => 'addProduct'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <form class="col-sm-12" action="{{ route('product.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="col-sm-6">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="nhập tên danh mục" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                    placeholder="Giá sản phẩm" value="{{ old('price') }}">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control  " name="category_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập Tags</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                                <textarea name="contents" class="form-control my-editor @error('contents') is-invalid @enderror" rows="20">
                                {{ old('contents') }}
                                </textarea>
                                @error('contents')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors\select2\select2.min.js') }}"></script>
    <script src="{{ asset('vendors\timymce\tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('admins\product\add.js') }}"></script>
@endsection
