@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    @for ($i = 0; $i < 2; $i++)
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin blog ({{ $i == 0 ? 'Bản Tiếng Việt' : 'Bản Tiếng Anh' }})</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="table-responsive">
                    @if ($i == 0)
                        <label for="title">Ảnh bìa blog (Áp dụng cho cả bản Tiếng Anh và Tiếng Việt)</label>
                        <br>
                        <img src="{{ asset('img/client/blog/'.$blog->thumbnail) }}" width="200px" height="auto" alt="">
                        <hr>
                    @endif
                        <div class="form-group mt-3">
                            <label for="title">Tiêu đề</label>
                            <input readonly type="text" class="form-control" id="title" aria-describedby=""
                                name="title" placeholder="Nhập tên size" value="{{ $i == 0 ? $blog->title : $blog->title_en }}" style="background-color: #f8f9fa; cursor: not-allowed; opacity: 1;">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Mô tả</label>
                            <textarea readonly class="form-control" id="subtitle" aria-describedby="" name="subtitle"
                                placeholder="Nhập chi tiết phụ kiện" style="background-color: #f8f9fa; cursor: not-allowed; opacity: 1;">{{ $i == 0 ? $blog->subtitle : $blog->subtitle_en }}</textarea>
                        </div>
                        <div class="form-group">
                            <input readonly type="hidden" id="content" name="content">
                            <label for="editor">Nội dung</label>
                            <div id="{{ ($i == 0 ? 'editor' : 'editor_en') }}" name="editor" style="min-height: 300px !important"></div>
                        </div>
                        <input type="hidden" id="id" name="id" value="{{ $blog->id }}">
                        <small class="text-danger" id="error"></small> <br>
                        <a class="btn btn-primary mt-4" href="{{ route('admin.blog.index') }}">Quay về</a>
                </div>
            </div>
        </div>

    </div>
    @endfor
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
        var detail = true;
    </script>
@endsection
