@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Quản lý Size</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" href="{{ route('admin.variation.show_add') }}">Thêm size mới</a>
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
                                    <th>Tên</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên</th>
                                    <th>Chức năng</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($allVariation as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-outline-warning"
                                                href="{{ route('admin.variation.edit', ['id' => $item->id]) }}">
                                                Sửa
                                            </a>
                                            @if (!$item->deleted_at)
                                                <a class="btn btn-warning"
                                                    onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn ẩn size {{ $item->name }} chứ?')) { window.location.href = '{{ route('admin.variation.delete', ['id' => $item->id]) }}'; }"
                                                > Nhấn để tạm ẩn </a>
                                                @endif
                                                @if ($item->deleted_at)
                                                <a class="btn btn-info"
                                                onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn khôi phục size {{ $item->name }} chứ?')) { window.location.href = '{{ route('admin.variation.restore', ['id' => $item->id]) }}'; }"
                                                > Khôi phục </a>
                                                @endif
                                                <a class="btn btn-outline-danger"
                                                    onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn XOÁ VĨNH VIỄN size {{ $item->name }} chứ?\nLƯU Ý: Nếu trong danh mục này còn tồn tại sản phẩm, việc xoá sẽ LOẠI BỎ GIÁ CỦA SIZE ĐÓ KHỎI TẤT CẢ SẢN PHẨM\n(Sản phẩm gốc vẫn sẽ được giữ nguyên)\nBạn sẽ phải thiết đặt lại giá sản phẩm cho các size mới tạo!')) { window.location.href = '{{ route('admin.variation.destroy', ['id' => $item->id]) }}'; }"
                                                > Xoá vĩnh viễn </a>
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
