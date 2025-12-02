@extends('admin.master')

@section('main')
    <div id="content-wrapper" class="d-flex flex-column">

        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Thống kê voucher</h1>

            <!-- Bộ lọc -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <form method="GET" class="form-inline">
                        <div class="form-group mr-2 mb-2">
                            <label for="from" class="mr-2">Từ ngày</label>
                            <input type="date" name="from" id="from"
                                   value="{{ request('from', $from->format('Y-m-d')) }}"
                                   class="form-control">
                        </div>

                        <div class="form-group mr-2 mb-2">
                            <label for="to" class="mr-2">Đến ngày</label>
                            <input type="date" name="to" id="to"
                                   value="{{ request('to', $to->format('Y-m-d')) }}"
                                   class="form-control">
                        </div>

                        <button class="btn btn-primary mb-2">Lọc</button>
                    </form>
                </div>
            </div>

            <!-- Bảng -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thống kê theo mã voucher</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Mã voucher</th>
                                <th>Tổng lượt dùng</th>
                                <th>Thành công</th>
                                <th>Thất bại</th>
                                <th>Tỉ lệ thành công</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Mã voucher</th>
                                <th>Tổng lượt dùng</th>
                                <th>Thành công</th>
                                <th>Thất bại</th>
                                <th>Tỉ lệ thành công</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @forelse($stats as $row)
                                @php
                                    $rate = $row['total'] > 0 ? round($row['success'] * 100 / $row['total'], 1) : 0;
                                @endphp
                                <tr>
                                    <td><strong>{{ $row['code'] }}</strong></td>
                                    <td>{{ $row['total'] }}</td>
                                    <td class="text-success">{{ $row['success'] }}</td>
                                    <td class="text-danger">{{ $row['failed'] }}</td>
                                    <td>{{ $rate }}%</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Chưa có dữ liệu</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
