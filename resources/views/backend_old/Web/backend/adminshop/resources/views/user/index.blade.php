@extends('layouts.admin')

@section('title')
    <title>User List</title>
@endsection

@section('js')
    <script src="{{ asset('public/sweetalert/js1.js') }}"></script>
    <script src="{{ asset('public/sweetalert/js.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('patials.content_header', ['name'=>'User', 'key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('user_create') }}" class="btn btn-success float-right m-2" >Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Tài khoản</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userd as $userItem)
                            <tr>
                                <th scope="row">{{$userItem->id}}</th>
                                <td>{{$userItem->name}}</td>
                                <td>{{$userItem->email}}</td>
                                <td>
                                    @can('user-edit')
                                         <a href="{{ route('user_edit', ['id' => $userItem->id]) }}" class="btn btn-default">Edit</a>
                                    @endcan
                                    @can('user-delete')
                                        <a href="" data-url="{{ route('user_delete', ['id'=>$userItem->id]) }}" class="btn btn-danger action_delete">Delete</a>
                                    @endcan
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $userd->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
