@extends('layouts.admin')

@section('title')
<title>Products Edit</title>
@endsection
@section('css')
<link href="{{ asset('public/vendor/select2/select2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('public/product/add/add.css') }}">
@endsection
@section('content')
<div class="content-wrapper">
    @include('patials.content_header', ['name' => 'Product', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('product_update',['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   value="{{ $product->name }}"
                                   placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Giá Sản Phẩm</label>
                            <input type="text"
                                   class="form-control"
                                   name="price"
                                   value="{{ $product->price }}"
                                   placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Chọn Ảnh</label>
                            <input type="file"
                                   class="form-control-file"
                                   name="feature_image_path"
                                   >
                            <div class="col-md-3">
                                <div class="row">
                                    <img style="height: 200px; width: 100%; padding-top: 30px; " src="{{ asset('public/'.$product->feature_image_path) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file"
                                   multiple="multiple"
                                   class="form-control-file"
                                   name="image_path[]">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($product->productImages as $productImageItem)
                                        <div class="col-md-3">
                                            <img style="height: 200px; width: 100%; padding-top: 30px; "  src="{{ asset('public/'.$productImageItem->image_path)  }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Chọn danh mục</label>
                            <select class="form-control option_category"  name="category_id">
                                {{!! $htmloption !!}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhập tags</label>
                            <select name="tags[]"  class="form-control tags_choose" multiple="multiple">
                                @foreach($product->tags as $tagItem)
                                    <option value="{{ $tagItem->name }}" selected> {{ $tagItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control my-editor" name="contents" rows="3">{{ $product->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@section('js')
<script src="{{ asset('public/vendor/select2/select2.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/acffs5w36scrqtyzyeyqi7llr1qpjh5cb034kc4e77t2dial/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{ asset('public/product/add/add.js') }}"></script>
@endsection


