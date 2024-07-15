@extends('admin.master')
@php
    use App\Helper\Helper;
@endphp
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-flex justify-content-between">
                <h1 class="h3 mb-2 text-gray-800">Chi tiết hóa đơn số {{ $billInfo->id }}</h1>
                <a href="{{ route('admin.bill.index') }}" class="btn btn-primary mb-1">Back</a>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form action="{{ route('admin.bill.edit_status')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên người đặt</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name=""
                                    disabled placeholder="" value="{{ $billInfo->full_name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name=""
                                    disabled placeholder="" value="{{ $billInfo->address }}">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name=""
                                    disabled placeholder="" value="{{ $billInfo->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name=""
                                    disabled placeholder="" value="{{ $billInfo->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Voucher code</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name=""
                                    disabled placeholder="" value="{{ $billInfo->voucher_code }}">
                            </div>
                            <div class="form-group">
                                <label for="">Phương thức giao hàng</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name=""
                                    disabled placeholder=""
                                    value="{{ Helper::DELIVERY_METHOD[$billInfo->delivery_method] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Phương thức thanh toán</label>
                                <input type="text" class="form-control" id="" aria-describedby="" name=""
                                    disabled placeholder=""
                                    value="{{ Helper::PAYMENT_METHOD[$billInfo->payment_method] }}">
                            </div>
                            <div class="form-group">
                                <label for="">Tổng tiền</label>
                                <input type="number" class="form-control" id="" aria-describedby="" name=""
                                    disabled placeholder="" value="{{ $billInfo->total_amount }}">
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái thanh toán</label>
                                <select required class="form-control" data-live-search="true" name="bill_status"
                                    id="billStatus">
                                    <option {{ Helper::BILL_UNPAID == $billInfo['status'] ? 'selected' : '' }}
                                        value="{{ Helper::BILL_UNPAID }}">
                                        Chưa thanh toán </option>
                                    <option {{ Helper::BILL_PAID == $billInfo['status'] ? 'selected' : '' }}
                                        value="{{ Helper::BILL_PAID }}">
                                        Đã thanh toán </option>
                                </select>
                            </div>
                            <input type="hidden" name="bill_id" value="{{ $billInfo['id'] }}">
                            <button class="btn btn-primary mb-4" type="submit">Cập nhật</button>

                        </form>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên bánh</th>
                                    <th>Size bánh</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên bánh</th>
                                    <th>Size bánh</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($billInfo->bill_details as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->variations->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->price * $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



    </div>
    {{-- @include('admin.modal.branch_detail_modal') --}}
    <!-- End of Content Wrapper -->
@endsection
