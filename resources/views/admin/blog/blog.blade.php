@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Quản lý Blog</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" href="{{ route('admin.blog.show_add') }}">Thêm blog</a>
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
                                    <th>Tiêu đề (Tiếng Việt)</th>
                                    <th>Tiêu đề (Tiếng Anh)</th>
                                    <th>Mô tả (Tiếng Việt)</th>
                                    <th>Mô tả (Tiếng Anh)</th>
                                    <th>Thumbnail (Ảnh bìa blog)</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tiêu đề (Tiếng Việt)</th>
                                    <th>Tiêu đề (Tiếng Anh)</th>
                                    <th>Mô tả (Tiếng Việt)</th>
                                    <th>Mô tả (Tiếng Anh)</th>
                                    <th>Thumbnail (Ảnh bìa blog)</th>
                                    <th>Chức năng</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($allBlog as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->title_en }}</td>
                                        <td>{{ $item->subtitle }}</td>
                                        <td>{{ $item->subtitle_en }}</td>
                                        <td class="text-center"><img width="200px"
                                            src="{{ url('img') . '/client/blog/' . $item['thumbnail'] }}" alt=""></td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" href="{{ route('admin.blog.showEdit', ['id' => $item->id]) }}">Sửa</a>
                                            @if (!$item->deleted_at)
                                                <a class="btn btn-outline-danger"
                                                    onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn ẩn blog ({{ $item->title }}) chứ?')) { window.location.href = '{{ route('admin.blog.delete', ['id' => $item->id]) }}'; }"
                                                    > Nhấn để ẩn </a>
                                            @endif
                                            @if ($item->deleted_at)
                                                <a class="btn btn-outline-success"
                                                onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn hiện blog ({{ $item->title }}) chứ?')) { window.location.href = '{{ route('admin.blog.restore', ['id' => $item->id]) }}'; }"
                                                    > Khôi phục </a>
                                            @endif
                                            <a class="btn btn-info" href="{{ route('admin.blog.showDetail', ['id' => $item->id]) }}">Xem chi tiết</a>
                                            <a class="btn btn-danger" onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn XOÁ VĨNH VIỄN blog ({{ $item->title }}) chứ?\nLưu ý: Blog này sẽ không thể khôi phục sau khi đã xoá')) { window.location.href = '{{ route('admin.blog.destroy', ['id' => $item->id]) }}'; }">Xoá vĩnh viễn</a>
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
