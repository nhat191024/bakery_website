@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tin nhắn từ khách hàng (Chưa đọc)</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-info" href="{{ route('admin.message.deleted') }}">Xem tin nhắn đã đọc</a>
                    <a class="btn btn-success" href="{{ route('admin.message.deleteAll') }}">Đánh dấu tất cả là ĐÃ ĐỌC</a>
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
                                    <th>Tên KH</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Thời gian</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên KH</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Thời gian</th>
                                    <th>Chức năng</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($allMessage as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td>{{ $item['phone'] }}</td>
                                        <td>
                                            <div style="max-height: 70px; max-width: 100px; overflow: hidden">
                                                {{ $item['subject'] }}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="max-height: 70px; overflow: hidden">
                                                {{ $item['message'] }}
                                            </div>
                                        </td>
                                        <td>{{$helper::getTimePassedBy($item['created_at']) }} - {{date("H:i", strtotime($item['created_at'])) }} - {{ date("d-m-Y", strtotime($item['created_at'])) }}</td>
                                        <td class="text-center">

                                            <a class="btn btn-info"
                                                href="{{ route('admin.message.show_detail', ['id' => $item->id]) }}"
                                                >Chi tiết</a>
                                            <a class="btn btn-success"
                                                href="{{ route('admin.message.delete', ['id' => $item->id]) }}"
                                                >Đã đọc</a>
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
