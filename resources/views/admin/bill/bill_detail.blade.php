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
                <h1 class="h3 mb-2 text-gray-800">Chi tiết hóa đơn #{{ $billInfo->id }} - Nhận
                    {{ $helper::getTimePassedBy($billInfo->created_at) }}</h1>
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
                        <div class="form-group">
                            <p><strong>Tên người đặt: </strong>{{ $billInfo->full_name }}</p>
                        </div>
                        <div class="form-group">
                            <p><strong>Địa chỉ: </strong>{{ $billInfo->address }}</p>
                        </div>
                        <div class="form-group">
                            <p><strong>Số điện thoại: </strong>{{ $billInfo->phone_number }}</p>
                        </div>
                        <div class="form-group">
                            <p><strong>Email: </strong>{{ $billInfo->email }}</p>
                        </div>
                        <div class="form-group">
                            <p><strong>Voucher code: </strong>{{ $billInfo->voucher_code }}</p>
                        </div>
                        <div class="form-group">
                            <p><strong>Ngày đặt hàng: </strong>{{ $billInfo->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <div class="form-group">
                            <p><strong>Phương thức giao hàng:
                                </strong>{{ Helper::DELIVERY_METHOD[$billInfo->delivery_method] }}</p>
                        </div>
                        <div class="form-group">
                            <p><strong>Phương thức thanh toán:
                                </strong>{{ Helper::PAYMENT_METHOD[$billInfo->payment_method] }}</p>
                        </div>
                        <div class="form-group">
                            <h5 class="text-gray-900"><strong>Tổng tiền:
                                </strong>{{ number_format($billInfo->total_amount) }}đ</h5>
                        </div>
                        <p
                            class="{{ $billInfo->status == 0 ? 'text-danger' : ($billInfo->status == 2 ? 'text-warning' : 'text-success') }}">
                            <strong>Trạng thái thanh toán: </strong>
                            {{ Helper::BILL_STATUS[$billInfo['status']] }}</p>

                        <input type="hidden" name="bill_id" value="{{ $billInfo['id'] }}">
                        <a href="{{ route('admin.bill.updateStatus', ['bill_id' => $billInfo['id'], 'bill_status' => Helper::BILL_UNPAID]) }}"
                            class="btn btn-warning mb-4"
                            onclick="return confirmAction('Đánh dấu là CHƯA THANH TOÁN?', this.href)">
                            Đánh dấu là chưa thanh toán
                        </a>
                        <a href="{{ route('admin.bill.updateStatus', ['bill_id' => $billInfo->id, 'bill_status' => Helper::BILL_PAID]) }}"
                            class="btn btn-success mb-4"
                            onclick="return confirmAction('Đánh dấu là ĐÃ THANH TOÁN?', this.href)">
                            Đánh dấu là đã thanh toán
                        </a>
                        <a href="{{ route('admin.bill.updateStatus', ['bill_id' => $billInfo->id, 'bill_status' => Helper::BILL_CANCEL]) }}"
                            class="btn btn-danger mb-4" onclick="return confirmAction('Xác nhận HUỶ ĐƠN?', this.href)">
                            Huỷ đơn
                        </a>
                        <br>
                        <a href="{{ route('admin.bill.index') }}" class="btn btn-primary mb-1">Quay về</a>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <hr>
                            <h3>Danh sách sản phẩm có trong đơn hàng này</h3>
                            @if ($billInfo->accessory && $billInfo->accessory->name && $billInfo->accessory->price)
                                <h4 class="font-weight-bold text-info">
                                    Phụ kiện: {{ $billInfo->accessory->name }} -
                                    {{ number_format($billInfo->accessory->price) }}đ
                                </h4>
                                <small class="text-info mb-3">({{ $billInfo->accessory->description ?? '' }})</small>
                            @else
                                <h4 class="font-weight-bold text-info">Khách không chọn phụ kiện</h4>
                            @endif

                            <hr>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên bánh</th>
                                    <th>Size bánh</th>
                                    <th>Số lượng</th>
                                    <th>Giá 1 bánh</th>
                                    <th>Tổng cộng</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên bánh</th>
                                    <th>Size bánh</th>
                                    <th>Số lượng</th>
                                    <th>Giá 1 bánh</th>
                                    <th>Tổng cộng</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($billInfo->bill_details as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ Helper::getWithTrashedProductById($item->product_id)?->name ?? 'Sản phẩm đã bị xoá' }}
                                        </td>
                                        <td>{{ Helper::getWithTrashedVariationById($item->variation_id)?->name ?? 'Size đã bị xoá' }}
                                        </td>

                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                        <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group text-center">
                            <h3 class="mt-3 text-gray-900"><strong>Tổng tiền:
                                </strong>{{ number_format($billInfo->total_amount) }}đ</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



    </div>
    <script>
        function confirmAction(message, url) {
            if (confirm(message)) {
                window.location.href = url;
                return true;
            } else {
                return false;
            }
        }
    </script>
    <!-- End of Content Wrapper -->
@endsection
