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
                    <form action="{{ route('admin.product.edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="categorySelect">Chọn danh mục</label>
                            <select required name="category_id" class="form-control" id="categorySelect">
                                @foreach ($allCategory as $key => $item)
                                    <option {{ $productInfo['category_id'] == $item['id'] ? 'selected' : '' }} value="{{ $item['id'] }}">
                                        {{ $item['name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên sản phẩm (Tiếng Việt)</label>
                            <input maxlength="255" required type="text" class="form-control" id="productName" aria-describedby=""
                                name="product_name" value="{{ $productInfo->name }}" placeholder="Nhập tên sản phẩm bằng Tiếng Việt">
                        </div>
                        <div class="form-group">
                            <label for="">Tên sản phẩm (Tiếng Anh)</label>
                            <input maxlength="255" required type="text" class="form-control" id="productName_en" aria-describedby=""
                                name="product_name_en" value="{{ $productInfo->name_en }}" placeholder="Nhập tên sản phẩm bằng Tiếng Anh">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung giới thiệu (Tiếng Việt)</label>
                            <input type="text" class="form-control" id="productDescription" aria-describedby=""
                                name="product_description" placeholder="Nhập nội dung sản phẩm bằng Tiếng Việt" value="{{ $productInfo->description }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung giới thiệu (Tiếng Anh)</label>
                            <input type="text" class="form-control" id="productDescription_en" aria-describedby=""
                                name="product_description_en" placeholder="Nhập nội dung sản phẩm bằng Tiếng Anh" value="{{ $productInfo->description_en }}">
                        </div>
                        <label for="">Giá (Bắt buộc phải có ít nhất 1 size)</label>

                        @foreach ($allVariations as $size)
                            <div class="form-group d-flex align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <input name="product_size" type="checkbox" class="custom-control-input" id="size_{{ $size['id'] }}" data-id="{{ $size['id'] }}"
                                        {{ $productInfo->product_variations->where('variation_id', $size['id'])->first() ? 'checked' : '' }}
                                    >
                                    <label class="custom-control-label" for="size_{{ $size['id'] }}">{{ $size['name'] }}</label>
                                </div>
                                <input type="number" class="form-control ml-2 size_price" id="size_price_{{ $size['id'] }}"
                                    aria-describedby="" name="product_price" placeholder="Nhập giá cho size {{ $size['name'] }}"
                                    value="{{ $productInfo->product_variations->where('variation_id', $size['id'])->first()?->price }}"
                                    >
                            </div>
                        @endforeach

                        <label for="">Ảnh sản phẩm (Không chọn để giữ nguyên ảnh)</label>
                        <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" id="customFile"
                                name="product_image">
                            <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                        </div>
                        <input type="hidden" name="id" id="productId" value="{{$productInfo->id}}">
                        <a class="btn btn-primary mt-4" onclick="history.back()">Quay lại</a>
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
        const token = "{{ csrf_token() }}";
    </script>
    <script src="{{ URL::asset('js/admin/product_checkbox.js') }}"></script>
    <script src="{{ URL::asset('js/admin/product_edit.js') }}"></script>
@endsection
