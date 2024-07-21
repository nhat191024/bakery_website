@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa Voucher</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.voucher.edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $voucher->id }}">
                        <div class="form-group">
                            <label for="voucherCodeField">VOUCHER CODE</label>
                            <button class="btn btn-primary" id="generateVoucherCodeBtn" onclick="generateVoucherCode()" type="button" style="margin: 5px">Tạo Mã</button>
                            <input maxlength="255" required type="text" class="form-control" id="voucherCodeField" aria-describedby=""
                                name="code" placeholder="Nhập mã hoặc bấm TẠO" value="{{$voucher->code}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <input type="text" class="form-control" id="description" aria-describedby=""
                                name="description" placeholder="Nhập mô tả cho voucher" value="{{$voucher->description}}">
                        </div>
                        <div class="form-group">
                            <label for="discount_amount">Giá giảm</label>
                            <input required type="number" class="form-control" id="discount_amount" aria-describedby=""
                                name="discount_amount" placeholder="Nhập giá giảm" value="{{$voucher->discount_amount}}">
                        </div>
                        <div class="form-group">
                            <label for="min_price">Giá đơn tối thiểu để áp dụng Voucher</label>
                            <input required type="number" class="form-control" id="min_price" aria-describedby=""
                                name="min_price" placeholder="Nhập tối thiểu" value="{{$voucher->min_price}}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số lần sử dụng</label>
                            <input required type="number" class="form-control" id="quantity" aria-describedby=""
                                name="quantity" placeholder="Nhập số lần sử dụng" value="{{$voucher->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Ngày hiệu lực (Định dạng: Năm/Tháng/Ngày)</label>
                            <input required type="date" class="form-control" id="start_date" aria-describedby=""
                                name="start_date" placeholder="Ngày kết thúc"
                                value="{{ \Carbon\Carbon::parse($voucher->start_date)->format('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="end-time">Ngày hết hạn (Định dạng: Năm/Tháng/Ngày)</label>
                            <input required type="date" class="form-control" id="end-time" aria-describedby=""
                                name="end_date" placeholder="Ngày kết thúc"
                                value="{{ \Carbon\Carbon::parse($voucher->end_date)->format('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1" @if($voucher->status == 1) selected @endif >Mở</option>
                                <option value="0" @if($voucher->status == 0) selected @endif >Vô hiệu hoá</option>
                            </select>
                        </div>
                        
                        <button class="btn btn-primary mt-4" type="button" onclick="window.history.back()">Quay Lại</button>
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
