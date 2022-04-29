@extends('admin.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới banner</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <form action="{{route('banner.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" class="form-control" name="title">
                        {{-- @error('name')
                            <span style="color: red" role="alert">
                                {{$message}}
                            </span>
                        @enderror --}}
                </div>

                <div class="form-group">
                    <label for="">Ảnh banner</label>
                    <div class="custom-file">
                        <input type="file" name="banner_img" class="" id="validatedCustomFile">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                    <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src="" id="previewImage">
                </div>
                
                <div class="form-group">
                    <label for="">Mức giảm giá</label>
                    <input type="text" class="form-control" name="discount">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="input" value="1" checked>
                    <label class="form-check-label" for="exampleRadios1">Hiện</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="input" value="2">
                    <label class="form-check-label" for="exampleRadios2">Ẩn</label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
