@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add blog</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="table-responsive">
                    <form>
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input required type="text" class="form-control" id="title" aria-describedby=""
                                name="title" placeholder="Nhập tên size">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Mô tả</label>
                            <textarea required class="form-control" id="subtitle" aria-describedby="" name="subtitle"
                                placeholder="Nhập chi tiết phụ kiện"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="content" name="content" required>
                            <label for="editor">Nội dung</label>
                            <div id="editor" name="editor"></div>
                        </div>
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
        var csrfToken = '{{ csrf_token() }}';
    </script>
@endsection
