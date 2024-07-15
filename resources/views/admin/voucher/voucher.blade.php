@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Danh sách Vouchers</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" href="{{ route('admin.voucher.show_add') }}">Thêm voucher</a>

                </div>
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
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>CODE</th>
                                    <th>Mô tả</th>
                                    <th>Giá giảm</th>
                                    <th>Giá tổi thiểu để áp dụng voucher</th>
                                    <th>Số lượng dùng</th>
                                    <th>Ngày hiệu lực</th>
                                    <th>Ngày hết hạn</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>CODE</th>
                                    <th>Mô tả</th>
                                    <th>Giá giảm</th>
                                    <th>Giá tổi thiểu để áp dụng voucher</th>
                                    <th>Số lượng dùng</th>
                                    <th>Ngày hiệu lực</th>
                                    <th>Ngày hết hạn</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($vouchers as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->discount_amount }}</td>
                                        <td>{{ $item->min_price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->end_date)->format('d-m-Y') }}</td>
                                        <td>{{ ($item->status == 0 ? 'Đã bị khoá':'Mở') }}</td>
                                            <td class="text-center">
                                            <a class="btn btn-warning"
                                                href="{{ route('admin.voucher.show_edit', ['id' => $item->id]) }}">Sửa</a>

                                                <a class="btn btn-danger"
                                                    href="{{ route('admin.voucher.delete', ['id' => $item->id]) }}"
                                                    onclick="confirm('Bạn chắc chắn muốn XOÁ voucher {{$item->code}} chứ?')"> XOÁ </a>

                                            {{-- <a class="btn btn-info"
                                                href="{{ route('admin.voucher.show_detail', ['id' => $item->id]) }}">Chi
                                                tiết</a> --}}
                                        </td>

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
    <!-- End of Content Wrapper -->
@endsection
