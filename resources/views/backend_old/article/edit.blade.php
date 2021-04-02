@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật tin tức <a href="{{route('admin.article.index')}}" class="btn bg-purple pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin chi tiết tin tức</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            @if ($errors->any())
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-warning"></i> Cảnh báo !</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.article.update', ['id' => $data->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputSupplier">Tiêu đề tin tức</label>
                                <input value="{{ $data->title }}" type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề tin tức">
                                @if ($errors->has('title'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('title') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" id="new_image" name="new_image">
                                <br>
                                <img src="{{ asset($data->image) }}" width="350" alt="">
                                @if ($errors->has('new_image'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('new_image') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSupplier">Mô tả ngắn</label>
                                <input value="{!! $data->summary !!}" type="text" class="form-control" id="title" name="summary" placeholder="Tiêu đề tin tức">
                                @if ($errors->has('summary'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('summary') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea id="editor1" name="description" class="form-control" rows="4" placeholder="Enter ...">{{ $data->description }}</textarea>
                                @if ($errors->has('description'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('description') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Danh mục tin tức</label>
                                <select class="form-control" name="category_id">
                                    <option value="select"> -- chọn Danh mục --</option>
                                @foreach($categories as $category)
                                        @if($category->type == 2)
                                            <option {{ ($data->category_id == $category->id ? 'selected' : '') }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                 @endforeach
                                </select>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="{{ $data->position }}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active" {{ ($data->is_active == 1) ? 'checked' : '' }}> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brandOption">Tác giả</label>
                                        <select class="form-control" name="user_id">
                                            <option value="select"> -- chọn tác giả --</option>
                                            @foreach($users as $user)
                                                <option {{ ($data->user_id == $user->id) ? 'selected' : ''}} value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSupplier">Điều hướng liên kết url</label>
                                <input value="{{ $data->url }}" type="text" class="form-control" id="title" name="url" placeholder="Điều hướng tới ...">
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        // $(function () {
        //     var _ckeditor = _ckeditor.replace('editor1');
        //     _ckeditor.config.height = 500;
        //     var _ckeditor = _ckeditor.replace('editor1');
        //     _ckeditor.config.width = 200;
        // })
        $(function (){
            var _ckeditor = CKEDITOR.replace( 'editor1',{
                filebrowserBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html') }}',
                filebrowserImageBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html?type=Images') }}',
                filebrowserFlashBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html?type=Flash') }}',
                filebrowserUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                filebrowserImageUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                filebrowserFlashUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
            } );
            _ckeditor.config.height = 500;
        })

    </script>
@endsection
