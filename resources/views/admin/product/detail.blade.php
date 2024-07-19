@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thông tin sản phẩm</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body row">
                <div class="table-responsive col-md-6 col-12">
                        <div class="form-group">
                            <label for="categorySelect">Danh mục</label>
                            <select readonly disabled name="category_id" class="form-control" id="categorySelect">
                                        <option> {{ $productInfo->categories->name }} </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input readonly maxlength="255" required type="text" class="form-control" id="productName" aria-describedby=""
                                name="product_name" value="{{ $productInfo->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung giới thiệu</label>
                            <textarea readonly class="form-control" id="productDescription" aria-describedby=""
                                name="product_description" placeholder="Nhập nội dung sản phẩm" rows="3">{{ $productInfo->description }}</textarea>
                        </div>
                        <label for="">Giá Sản Phẩm</label>

                        @foreach ($allVariations as $size)
                            <div class="form-group d-flex align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <input disabled name="product_size" type="checkbox" class="custom-control-input" id="size_{{ $size['id'] }}" data-id="{{ $size['id'] }}"
                                        {{ $productInfo->product_variations->where('variation_id', $size['id'])->first() ? 'checked' : '' }}
                                    >
                                    <label class="custom-control-label" for="size_{{ $size['id'] }}">{{ $size['name'] }}</label>
                                </div>
                                <input readonly type="number" class="form-control ml-2 size_price" id="size_price_{{ $size['id'] }}"
                                    aria-describedby="" name="product_price" placeholder="Sản phẩm hiện không có size này"
                                    value="{{ $productInfo->product_variations->where('variation_id', $size['id'])->first()?->price }}"
                                    >
                            </div>
                        @endforeach

                        <div style="display: flex; flex-direction: column; align-items: center;">

                            <input readonly type="hidden" name="id" id="productId" value="{{$productInfo->id}}">
                            <div style="display: flex;">
                                <a class="btn btn-primary mt-4" onclick="history.back()">Quay lại</a>
                                <a class="btn btn-warning mt-4 ml-2" href="{{ route('admin.product.show_edit', ['id' => $productInfo->id]) }}">Chỉnh sửa</a>
                            </div>
                        </div>




                </div>
                <div class="col-md-6 col-12">
                    <label for="">Ảnh sản phẩm (Preview)</label>
                    <div class="custom-file">
                        <img height="300px" src="{{ url('img') . '/' . $productInfo['image'] }}" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



    <!-- End of Content Wrapper -->
@endsection
