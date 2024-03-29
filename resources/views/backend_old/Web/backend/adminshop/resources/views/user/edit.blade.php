@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".select2").select2({
            placeholder: "Chọn vai trò",

        });
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('patials.content_header', ['name'=>'category', 'key' => 'Add'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('user_update', ['id'=>$user->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Tên danh mục </label>
                                <input value="{{ $user->name }}" class="form-control" placeholder="nhập danh mục" name="name">
                            </div>
                            <div class="form-group">
                                <label >Email </label>
                                <input value="{{ $user->email }}" type="email" placeholder="Nhập email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label >Password </label>
                                <input type="password" placeholder="Nhập password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label > Vai trò </label>
                                <select name="role_id[]" class="js-states form-control select2" multiple>
                                    <option value="0">chọn vai trò</option>
                                    @foreach($role as $Role)
                                        <option {{ $rolees->contains('id', $Role->id) ? 'selected' : '' }}
                                                value="{{ $Role->id }}" >
                                            {{ $Role->name }}</option>
                                    @endforeach
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
