@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa sản phẩm</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.product.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="categorySelect">Chọn danh mục</label>
                            <select required name="category_id" class="form-control" id="categorySelect">
                                @foreach ($allCategory as $key => $item)
                                    <option {{ $key == 0 ? 'selected' : '' }} value="{{ $item['id'] }}">
                                        {{ $item['name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên bánh</label>
                            <input maxlength="255" required type="text" class="form-control" id="" aria-describedby=""
                                name="product_name" placeholder="Nhập tên thực phẩm">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung giới thiệu</label>
                            <input type="text" class="form-control" id="" aria-describedby=""
                                name="product_description" placeholder="Nhập nội dung sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input required type="number" class="form-control" id="" aria-describedby=""
                                name="product_price" placeholder="Nhập giá sản phẩm">
                        </div>
                        <label for="">Ảnh bánh</label>
                        <div class="custom-file">
                            <input required type="file" accept="image/*" class="custom-file-input" id="customFile"
                                name="product_image">
                            <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                        </div>
                        <button class="btn btn-success mt-4" type="submit">Thêm</button>
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
