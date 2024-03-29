@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('js')
    <script src="{{ asset('public/sweetalert/js1.js') }}"></script>
    <script src="{{ asset('public/sweetalert/js.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('patials.content_header', ['name'=>'Category', 'key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                            <a href="{{ route('category_create') }}" class="btn btn-success float-right m-2" >Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Danh Mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $catItem)
                            <tr>
                                <th scope="row">{{$catItem->id}}</th>
                                <td>{{$catItem->name}}</td>
                                <td>
                                    @can('category-edit')
                                      <a href="{{ route('category_edit', ['id' => $catItem->id]) }}" class="btn btn-default">Edit</a>
                                    @endcan

                                    @can('category-delete')
                                            <a href="" data-url="{{ route('category_delete', ['id'=>$catItem->id]) }}" class="btn btn-danger action_delete">Delete</a>
                                        @endcan

                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$categories->links()}}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
