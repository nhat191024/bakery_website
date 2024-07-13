@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cập nhật giá sản phẩm</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.product.edit_detail') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên biến thể</label>
                            <input required type="text" class="form-control" id="" aria-describedby=""
                                name="detail_name" disabled value="{{$productVariatonInfo->variation->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input required type="number" class="form-control" id="" aria-describedby=""
                                name="product_price" placeholder="Nhập giá sản phẩm" value="{{$productVariatonInfo->price}}">
                        </div>
                        <input type="hidden" name="id" value="{{$productVariatonInfo->id}}">
                        <input type="hidden" name="product_id" value="{{$productId}}">
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
