@extends('layouts.admin')

@section('title')
    <title>Permisstion add</title>
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
        @include('patials.content_header', ['name' => 'Permisstion', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('store_permisstion') }}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label>Tên Modul</label>
                                    <select name="modul_parent" id="" class="form-control"  >
                                        <option value=""></option>
                                        @foreach(config('permisstion.table_parent') as $modulItem)
                                             <option value="{{ $modulItem }}"> {{ $modulItem }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                    <div class="form-group">
                                        <div class="row">
                                            @foreach(config('permisstion.table_child') as $childItem)
                                            <div class="col-md-3">
                                                <input type="checkbox" name="modul_child[]" value="{{ $childItem }}" > {{ $childItem }}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>



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

