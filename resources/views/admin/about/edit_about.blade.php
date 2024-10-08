@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa thông tin</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.about.edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tiêu đề (Tiếng Việt)</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="about_title" placeholder="Nhập tiêu đề bằng Tiếng Việt" value="{{ $aboutInfo['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tiêu đề (Tiếng Anh)</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="about_title_en" placeholder="Nhập tiêu đề bằng Tiếng Anh" value="{{ $aboutInfo['title_en'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung (Tiếng Việt)</label>
                            <textarea required type="text" class="form-control" id="" aria-describedby="" name="about_content"
                                placeholder="Nhập nội dung bằng Tiếng Việt" cols="30" rows="10">{{ $aboutInfo['description'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung (Tiếng Anh)</label>
                            <textarea required type="text" class="form-control" id="" aria-describedby="" name="about_content_en"
                                placeholder="Nhập nội dung bằng Tiếng Anh" cols="30" rows="10">{{ $aboutInfo['description_en'] }}</textarea>
                        </div>
                        <label for="">Ảnh giới thiệu</label>
                        <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" id="customFile"
                                name="about_image">
                            <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                        </div>
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button class="btn btn-success mt-4" type="submit">Sửa</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- End of Content Wrapper -->
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
