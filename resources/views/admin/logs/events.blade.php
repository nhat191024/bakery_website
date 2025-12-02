@extends('admin.master')

@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Log sự kiện (Event Logs)</h1>

            <!-- Bộ lọc -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <form method="GET" class="form-inline">
                        <div class="form-group mr-2 mb-2">
                            <label for="type" class="mr-2">Loại sự kiện</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">-- Tất cả --</option>
                                <option value="add_to_cart" {{ request('type') == 'add_to_cart' ? 'selected' : '' }}>
                                    Add to cart
                                </option>
                                <option value="apply_voucher" {{ request('type') == 'apply_voucher' ? 'selected' : '' }}>
                                    Apply voucher
                                </option>
                            </select>
                        </div>

                        <div class="form-group mr-2 mb-2">
                            <label for="from" class="mr-2">Từ ngày</label>
                            <input type="date" name="from" id="from"
                                   value="{{ request('from') }}" class="form-control">
                        </div>

                        <div class="form-group mr-2 mb-2">
                            <label for="to" class="mr-2">Đến ngày</label>
                            <input type="date" name="to" id="to"
                                   value="{{ request('to') }}" class="form-control">
                        </div>

                        <button class="btn btn-primary mb-2">Lọc</button>
                    </form>
                </div>
            </div>

            <!-- Bảng dữ liệu -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách log</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Thời gian</th>
                                <th>Loại</th>
                                <th>Session</th>
                                <th>Data</th>
                                <th>IP</th>
                                <th>User Agent</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Thời gian</th>
                                <th>Loại</th>
                                <th>Session</th>
                                <th>Data</th>
                                <th>IP</th>
                                <th>User Agent</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach ($events as $index => $event)
                                <tr>
                                    <td>{{ $events->firstItem() + $index }}</td>
                                    <td>{{ $event->created_at }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $event->type }}</span>
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($event->session_id, 15) }}</td>
                                    <td style="max-width: 300px;">
                                        <pre class="mb-0" style="white-space: pre-wrap; font-size: 11px;">
{{ json_encode($event->data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) }}
                                        </pre>
                                    </td>
                                    <td>{{ $event->ip }}</td>
                                    <td style="max-width: 250px;">
                                        <span title="{{ $event->user_agent }}">
                                            {{ \Illuminate\Support\Str::limit($event->user_agent, 30) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{-- phân trang --}}
                        {{ $events->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Content Wrapper -->
@endsection
