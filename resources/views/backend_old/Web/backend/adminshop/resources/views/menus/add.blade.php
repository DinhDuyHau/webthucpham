@extends('layouts.admin')

@section('title')
    <title>Menu Add</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('patials.content_header', ['name'=>'Menu', 'key' => 'Add'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menu_store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Tên menu </label>
                                <input  class="form-control" placeholder="nhập danh mục" name="name">
                            </div>
                            <div class="form-group">
                                <label ></label>
                                <select class="form-control"  name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {{!! $optionmenu !!}}
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
