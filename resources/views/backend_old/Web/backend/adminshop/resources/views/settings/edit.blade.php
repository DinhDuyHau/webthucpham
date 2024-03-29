@extends('layouts.admin')

@section('title')
    <title>Setting Add</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('patials.content_header', ['name'=>'Setting', 'key' => 'Add'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('setting_update', ['id' => $settings ->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label > Config value ({{ $settings->config_key}}) </label>
                                <textarea name="config_value" class="form-control" rows="4">{{ $settings->config_value }}</textarea>
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
