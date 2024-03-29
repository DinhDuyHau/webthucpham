@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/role/role.css') }}">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('public/role/role.js') }}"></script>

@endsection
@section('content')
    <div class="content-wrapper">
        @include('patials.content_header', ['name' => 'Role', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('role_store') }}" method="post">
                            <div class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    <label>Tên Vai trò</label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="Nhập tên vai trò">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả vai trò</label>
                                    <textarea
                                        class="form-control"
                                        name="display_name"> </textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <lable>
                                            <input type="checkbox" class="checkbox_grand">
                                            Checkall
                                        </lable>

                                    </div>
                                </div>

                            </div>
                            @foreach($permisstion as $perItem)
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="card body-primary col-md-12">
                                            <div class="card-header">
                                                <label for="">
                                                    <input type="checkbox" value="{{ $perItem->id }}" class="checkbox_parent">
                                                </label>
                                                Modul {{ $perItem->name }}
                                            </div>
                                            <div class="row">
                                                @foreach($perItem->permisstionchilr as $perchilItem)
                                                    <div class="card-body text-primary col-md-3" >
                                                        <h5 class="card-title">
                                                            <label for="">
                                                                <input type="checkbox" class="checkbox_chil" name="permisstion_id[]" value="{{ $perchilItem->id }}">
                                                            </label>
                                                            {{ $perchilItem->name }}
                                                        </h5>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

