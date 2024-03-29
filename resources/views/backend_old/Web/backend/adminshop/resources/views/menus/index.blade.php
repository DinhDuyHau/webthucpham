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
                            <a href="{{ route('menu_create') }}" class="btn btn-success float-right m-2" >Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menuItem)
                            <tr>
                                <th scope="row">{{$menuItem->id}}</th>
                                <td>{{$menuItem->name}}</td>
                                <td>
                                    @can('menu-edit')
                                        <a href="{{ route('menu_edit', ['id' => $menuItem->id]) }}" class="btn btn-default">Edit</a>
                                    @endcan

                                    @can('menu-delete')
                                        <a href="" data-url="{{ route('menu_delete', ['id'=>$menuItem->id]) }}" class="btn btn-danger action_delete">Delete</a>
                                    @endcan

                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $menus ->links() }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
