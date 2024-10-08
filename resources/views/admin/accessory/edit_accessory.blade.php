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
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="table-responsive">
                    <form action="{{ route('admin.accessory.saveEdit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên phụ kiện (Tiếng Việt)</label>
                            <input required type="text" class="form-control" id="name" aria-describedby=""
                                name="name" placeholder="Nhập tên size bằng Tiếng Việt" value="{{ $accessory->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name_en">Tên phụ kiện (Tiếng Anh)</label>
                            <input required type="text" class="form-control" id="name_en" aria-describedby=""
                                name="name_en" placeholder="Nhập tên size bằng Tiếng Anh" value="{{ $accessory->name_en }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Chi tiết phụ kiện (Tiếng Việt)</label>
                            <textarea required class="form-control" id="description" aria-describedby="" name="description" placeholder="Nhập chi tiết phụ kiện bằng Tiếng Việt"
                            >{{ $accessory->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Chi tiết phụ kiện (Tiếng Anh)</label>
                            <textarea required class="form-control" id="description_en" aria-describedby="" name="description_en" placeholder="Nhập chi tiết phụ kiện bằng Tiếng Anh"
                            >{{ $accessory->description_en }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input required type="number" class="form-control" id="price" aria-describedby=""
                                name="price" placeholder="Nhập giá phụ kiện" value="{{ $accessory->price }}">
                        </div>
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button class="btn btn-success mt-4" type="submit">Lưu thay đổi</button>
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
