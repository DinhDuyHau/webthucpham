@extends('layouts.admin')

@section('title')
    <title>Role List</title>
@endsection

@section('js')
    <script src="{{ asset('public/sweetalert/js1.js') }}"></script>
    <script src="{{ asset('public/sweetalert/js.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('patials.content_header', ['name'=>'Role', 'key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('role_create') }}" class="btn btn-success float-right m-2" >Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($role as $roleItem)
                            <tr>
                                <th scope="row">{{$roleItem->id}}</th>
                                <td>{{$roleItem->name}}</td>
                                <td>
                                    @can('role-edit')
                                         <a href="{{ route('role_edit', ['id' => $roleItem->id]) }}" class="btn btn-default">Edit</a>
                                    @endcan
                                    @can('role-delete')
                                         <a href="" data-url="{{ route('role_delete', ['id'=>$roleItem->id]) }}" class="btn btn-danger action_delete">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $role->links() }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
