@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa thông tin blog</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <form id="blogEditForm">
                            <input type="hidden" name="id" id="id" value="{{ $blog->id }}">
                            <div class="form-group">
                                <label for="title">Tiêu đề (Tiếng Việt)</label>
                                <input required type="text" class="form-control" id="title" aria-describedby=""
                                    name="title" placeholder="Nhập tiêu đề blog" value="{{ $blog->title }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Tiêu đề (Tiếng Anh)</label>
                                <input required type="text" class="form-control" id="title_en" aria-describedby=""
                                    name="title_en" placeholder="Nhập tiêu đề blog bằng tiếng Anh" value="{{ $blog->title_en }}">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="subtitle">Mô tả (Tiếng Việt)</label>
                                <textarea required class="form-control" id="subtitle" aria-describedby="" name="subtitle"
                                    placeholder="Nhập mô tả blog">{{ $blog->subtitle }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Mô tả (Tiếng Anh)</label>
                                <textarea required class="form-control" id="subtitle_en" aria-describedby="" name="subtitle_en"
                                    placeholder="Nhập mô tả blog bằng tiếng Anh">{{ $blog->subtitle_en }}</textarea>
                            </div>
                            <hr>
                            <label for="">Ảnh bìa blog (Không chọn để giữ nguyên ảnh cũ)</label>
                            <div class="custom-file mb-3">
                                <input
                                 type="file" accept="image/*" class="custom-file-input" id="customFile"
                                    name="thumbnail">
                                <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="hidden" id="content" name="content" required>
                                <label for="editor">Nội dung (Tiếng Việt)</label>
                                <div id="editor" name="editor" style="min-height: 300px !important"></div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="content_en" name="content_en" required>
                                <label for="editor_en">Nội dung (Tiếng Anh)</label>
                                <div id="editor_en" name="editor_en" style="min-height: 300px !important"></div>
                            </div>
                            <small class="text-danger" id="error"></small> <br>
                            <button class="btn btn-primary mt-4" type="button" onclick="history.back()">Quay lại</button>
                            <button class="btn btn-success mt-4" id="saveEdit" type="submit">Sửa bài đăng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- End of Content Wrapper -->
    <script>
        var csrfToken = '{{ csrf_token() }}';
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        var blogContent = {!! json_encode($blog->content) !!};
        var blogContent_en = {!! json_encode($blog->content_en) !!};
    </script>
@endsection
