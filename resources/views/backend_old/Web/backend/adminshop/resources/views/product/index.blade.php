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
                            <a href="{{ route('product_create') }}" class="btn btn-success float-right m-2" >Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $productItem)
                            <tr>
                                <th scope="row">{{$productItem->id}}</th>
                                <td>{{$productItem->name}}</td>
                                <td>{{ number_format( $productItem->price ) }}</td>
                                <td>
                                    <img height="100px" width="100px" src="{{ asset('public/'.$productItem->feature_image_path) }}">
                                </td>
                                <td>
                                    {{ optional( $productItem->category)->name }}
                                </td>
                                <td>
                                    @can('product-edit')
                                        <a href="{{ route('product_edit', ['id'=>$productItem->id])}}" class="btn btn-default">Edit</a>
                                    @endcan
                                    @can('product-delete')
                                        <a href="" data-url="{{ route('product_delete', ['id'=>$productItem->id]) }}" class="btn btn-danger action_delete">Delete</a>
                                    @endcan
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="col-md-3">
                            {{ $products ->links() }}
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
