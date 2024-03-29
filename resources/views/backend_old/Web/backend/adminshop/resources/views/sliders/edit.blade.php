@extends('layouts.admin')

@section('title')
    <title>Slider Add</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('patials.content_header', ['name'=>'Slider', 'key' => 'Add'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('slider_update', ['id'=>$sliders->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Tên Slider </label>
                                <input  class="form-control"
                                        value="{{$sliders->name}}"
                                        name="name">
                            </div>
                            <div class="form-group">
                                <label >Mô tả </label>
                                <textarea class="form-control" name="description" rows="3">{{ $sliders->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label >Hình ảnh</label>
                                <input type="file"  class="form-control-file"  name="image_path">
                                <div class="col-md-3">
                                    <img height="100px" width="100px" src="{{ config('app.base_url') . $sliders->image_path }}" alt="">
                                </div>
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
