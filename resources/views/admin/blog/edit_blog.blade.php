@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa thông tin blog</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="table-responsive">
                    <form action="{{ route('admin.blog.saveEdit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên phụ kiện</label>
                            <input required type="text" class="form-control" id="name" aria-describedby=""
                                name="name" placeholder="Nhập tên size" value="{{ $blog->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Chi tiết phụ kiện</label>
                            <textarea required class="form-control" id="description" aria-describedby="" name="description" placeholder="Nhập chi tiết phụ kiện"
                            >{{ $blog->subtitle }}</textarea>
                        </div>

                        <div id="editor"></div>

                        <input type="hidden" name="id" value="{{ $blog->id }}">
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
