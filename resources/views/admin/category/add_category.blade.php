@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm danh mục</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.category.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên danh mục (Tiếng Việt)</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="category_name" placeholder="Nhập tên danh mục bằng Tiếng Việt">
                        </div>
                        <div class="form-group">
                            <label for="">Tên danh mục (Tiếng Anh)</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="category_name_en" placeholder="Nhập tên danh mục bằng Tiếng Anh">
                        </div>
                        <button class="btn btn-success mt-4" type="submit">Thêm danh mục</button>
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
