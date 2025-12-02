@extends('admin.master')

@section('main')
<div id="content-wrapper" class="d-flex flex-column">

    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Danh sách cuộc chat</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Khách đang/đã chat</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên khách</th>
                            <th>Số điện thoại</th>
                            <th>Session ID</th>
                            <th>Trạng thái</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($chats as $index => $chat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $chat->name ?? 'Khách chưa nhập' }}</td>
                                <td>{{ $chat->phone ?? '-' }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($chat->session_id, 15) }}</td>
                                <td>
                                    <span class="badge badge-{{ $chat->status === 'open' ? 'success' : 'secondary' }}">
                                        {{ $chat->status }}
                                    </span>
                                </td>
                                <td>{{ $chat->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.chats.show', ['id' => (string)$chat->_id]) }}"
                                       class="btn btn-sm btn-primary">
                                        Xem & trả lời
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Chưa có cuộc chat nào</td>
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
