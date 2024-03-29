@extends('layouts.admin')

@section('title')
    <title>Setting List </title>
@endsection

@section('js')
    <script src="{{ asset('public/sweetalert/js1.js') }}"></script>
    <script src="{{ asset('public/sweetalert/js.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('patials.content_header', ['name'=>'Setting', 'key' => 'List'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <a href="{{ route('setting_create') }}" class="btn btn-success float-right m-2" >Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($setting as $settingItem)
                            <tr>
                                <th scope="row">{{$settingItem->id}}</th>
                                <td>{{$settingItem->config_key}}</td>
                                <td>{{$settingItem->config_value}}</td>
                                <td>
                                    @can('setting-edit')
                                      <a href="{{ route('setting_edit', ['id' =>$settingItem->id ]) }}" class="btn btn-default">Edit</a>
                                    @endcan
                                    @can('setting-delete')
                                            <a href="" class="btn btn-danger action_delete">Delete</a>
                                        @endcan


                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $setting ->links() }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
