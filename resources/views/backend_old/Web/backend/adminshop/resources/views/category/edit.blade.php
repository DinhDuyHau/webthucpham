@extends('layouts.admin')

@section('title')
    <title>Category Edit</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('patials.content_header', ['name'=>'category', 'key' => 'Edit'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('category_update',['id' => $category->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Tên danh mục </label>
                                <input  class="form-control" value="{{ $category->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label >Chọn danh mục</label>
                                <select class="form-control"  name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {{!! $htmloption !!}}
                                </select>
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
