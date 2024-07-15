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
                    <form action="{{ route('admin.promotion.saveEdit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="name">Tên SP</label>
                            <input required type="text" class="form-control" id="name" aria-describedby=""
                                name="name" placeholder="Nhập tên size" value="{{ $promotion->products->name }}">
                        </div>
                        // select option  --}}
                        <div class="form-group">
                            <label for="product_id">Chọn sản phẩm (sẽ hiển thị lên băng rôn)</label>
                            <select class="form-control" id="product_id" name="product_id">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $product->id == $promotion->product_id ? 'selected' : '' }}>{{'Danh mục: ' . $product->categories->name . ' - Bánh ' . $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Mô tả ngắn</label>
                            <textarea required class="form-control" id="description" aria-describedby="" name="description"
                                placeholder="Nhập chi tiết phụ kiện">{{ $promotion->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="start_time">Ngày bắt đầu (Định dạng: Năm/Tháng/Ngày)</label>
                            <input required type="date" class="form-control" id="start_time" aria-describedby=""
                                name="start_time" placeholder="Ngày kết thúc"
                                value="{{ \Carbon\Carbon::parse($promotion->start_time)->format('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="end-time">Ngày kết thúc (Định dạng: Năm/Tháng/Ngày)</label>
                            <input required type="date" class="form-control" id="end-time" aria-describedby=""
                                name="end_time" placeholder="Ngày kết thúc"
                                value="{{ \Carbon\Carbon::parse($promotion->end_time)->format('Y-m-d') }}">
                        </div>

                        <input type="hidden" name="id" value="{{ $promotion->id }}">
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
