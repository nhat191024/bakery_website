@extends('admin.master')

@section('main')
    <div id="content-wrapper" class="d-flex flex-column">

        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">
                Chat với: {{ $chat->name ?? 'Khách chưa nhập tên' }}
            </h1>
            <p>SĐT: {{ $chat->phone ?? '-' }} | Session: {{ $chat->session_id }}</p>

            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow mb-4" style="height: 500px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lịch sử tin nhắn</h6>
                        </div>
                        <div class="card-body" id="admin-chat-box" style="overflow-y: auto;">
                            @forelse($messages as $m)
                                <div
                                    class="mb-2 d-flex {{ $m->sender === 'admin' ? 'justify-content-end' : 'justify-content-start' }}">
                                    <div class="p-2 rounded
                                    {{ $m->sender === 'admin' ? 'bg-primary text-white' : 'bg-light' }}"
                                        style="max-width: 70%;">
                                        <small class="d-block mb-1">
                                            {{ $m->sender === 'admin' ? 'Admin' : $chat->name ?? 'Guest' }}
                                            @if ($m->created_at)
                                                • <span class="text-muted">
                                                    {{ $m->created_at }}
                                                </span>
                                            @endif
                                        </small>
                                        <div>{{ $m->text }}</div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">Chưa có tin nhắn nào.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gửi trả lời</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.chats.reply', ['id' => $chatId]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="reply-text">Nội dung</label>
                                    <textarea name="text" id="reply-text" rows="4" class="form-control @error('text') is-invalid @enderror"
                                        placeholder="Nhập nội dung trả lời..."></textarea>
                                    @error('text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Gửi cho khách
                                </button>
                            </form>
                        </div>
                    </div>

                    <a href="{{ route('admin.chats.index') }}" class="btn btn-secondary btn-sm">
                        ← Quay lại danh sách chat
                    </a>
                </div>
            </div>

        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const box = document.getElementById('admin-chat-box');

            function loadMessages() {
                fetch('{{ route('admin.chats.messages', ['id' => $chatId]) }}')
                    .then(res => res.json())
                    .then(messages => {
                        box.innerHTML = '';

                        messages.forEach(m => {
                            const div = document.createElement('div');

                            div.className = "mb-2 d-flex " +
                                (m.sender === 'admin' ? 'justify-content-end' :
                                'justify-content-start');

                            div.innerHTML = `
                        <div class="p-2 rounded ${m.sender === 'admin' ? 'bg-primary text-white' : 'bg-light'}"
                             style="max-width:70%;">
                            <small class="d-block mb-1">
                                ${m.sender === 'admin' ? 'Admin' : 'Khách'} • 
                                <span class="text-muted">${m.created_at ?? ''}</span>
                            </small>
                            <div>${m.text}</div>
                        </div>
                    `;

                            box.appendChild(div);
                        });

                        box.scrollTop = box.scrollHeight;
                    });
            }

            // load ngay từ đầu
            loadMessages();

            // Auto refresh mỗi 2s
            setInterval(loadMessages, 2000);
        });
    </script>
@endsection
