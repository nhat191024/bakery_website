@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm Banner</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.banner.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tiêu đề (Tiếng Việt)</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="banner_title" placeholder="Nhập tiêu đề bằng Tiếng Việt">
                        </div>
                        <div class="form-group">
                            <label for="">Tiêu đề (Tiếng Anh)</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="banner_title_en" placeholder="Nhập tiêu đề bằng Tiếng Anh">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung (Tiếng Việt)</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="banner_content" placeholder="Nhập nội dung bằng Tiếng Việt">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung (Tiếng Anh)</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="banner_content_en" placeholder="Nhập nội dung bằng Tiếng Anh">
                        </div>
                        <label for="">Ảnh Banner</label>
                        <div class="custom-file">
                            <input required type="file" accept="image/*" class="custom-file-input" id="customFile"
                                name="banner_image">
                            <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                        </div>
                        <button class="btn btn-success mt-4" type="submit">Thêm banner</button>
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
