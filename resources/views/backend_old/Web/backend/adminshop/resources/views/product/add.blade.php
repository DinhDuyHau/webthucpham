@extends('layouts.admin')

@section('title')
    <title>Product Add</title>
@endsection
@section('css')
    <link href="{{ asset('public/vendor/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/product/add/add.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('patials.content_header', ['name'=>'Product', 'key' => 'Add'])
        <div class="col-md-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('product_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Tên sản phẩm </label>
                                    <input value="{{old('name')}}" class="form-control" placeholder="nhập tên sản phẩm" name="name">
                                </div>
                                <div class="form-group">
                                    <label >Giá sản phẩm </label>
                                    <input value="{{ old('price') }}" class="form-control" placeholder="nhập giá sản phẩm" name="price">
                                </div>
                                <div class="form-group">
                                    <label >Ảnh đại diện </label>
                                    <input type="file" class="form-control-file" name="feature_image_path">
                                </div>
                                <div class="form-group">
                                    <label >Ảnh chi tiết </label>
                                    <input type="file" class="form-control-file" name="image_path[]" multiple>
                                </div>
                                <div class="form-group">
                                    <label>Nhập tags</label>
                                    <select  name="tags[]"  class="form-control tags_choose" multiple="multiple">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Chọn danh mục</label>
                                    <select class="form-control option_category"  name="category_id" >
                                        <option value=""></option>
                                        {{!! $htmloption !!}}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label >Mổ tả</label>
                                <textarea name="contents" class="form-control my-editor" rows="5">{{ old('contents') }}</textarea>

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="{{ asset('public/vendor/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/acffs5w36scrqtyzyeyqi7llr1qpjh5cb034kc4e77t2dial/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="{{ asset('public/product/add/add.js') }}"></script>
@endsection
