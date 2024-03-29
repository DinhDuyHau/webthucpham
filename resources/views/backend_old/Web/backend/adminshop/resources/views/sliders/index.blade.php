@extends('layouts.admin')

@section('title')
    <title>Menu List </title>
@endsection

@section('js')
    <script src="{{ asset('public/sweetalert/js1.js') }}"></script>
    <script src="{{ asset('public/sweetalert/js.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('patials.content_header', ['name'=>'Menu', 'key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <a href="{{ route('slider_create') }}" class="btn btn-success float-right m-2" >Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slider as $sliders)
                            <tr>
                                <th scope="row">{{$sliders->id}}</th>
                                <td>{{$sliders->name}}</td>
                                <td>{{$sliders->description}}</td>
                                <td><img height="100px" width="100px" src="{{asset('public' . $sliders->image_path)}}" alt=""></td>
                                <td>
                                    @can('slider-edit')
                                      <a href="{{ route('slider_edit', ['id' => $sliders->id]) }}" class="btn btn-default">Edit</a>
                                    @endcan
                                    @can('slider-delete')
                                      <a href="" data-url="{{ route('slider_delete', ['id'=>$sliders->id]) }}" class="btn btn-danger action_delete">Delete</a>
                                    @endcan

                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3">
                        {{ $slider ->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
