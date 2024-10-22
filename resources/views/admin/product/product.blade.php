@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" href="{{ route('admin.product.show_add') }}">Thêm sản phẩm</a>
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
                                    <th>Tên danh mục</th>
                                    <th>Tên sản phẩm (Tiếng Việt)</th>
                                    <th>Tên sản phẩm (Tiếng Anh)</th>
                                    <th>ND Giới thiệu (Tiếng Việt)</th>
                                    <th>ND Giới thiệu (Tiếng Anh)</th>
                                    <th>Giá</th>
                                    <th>Ảnh</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm (Tiếng Việt)</th>
                                    <th>Tên sản phẩm (Tiếng Anh)</th>
                                    <th>ND Giới thiệu (Tiếng Việt)</th>
                                    <th>ND Giới thiệu (Tiếng Anh)</th>
                                    <th>Giá thấp nhất</th>
                                    <th>Ảnh</th>
                                    <th>Chức năng</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($allProduct as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->categories->name }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['name_en'] }}</td>
                                        <td>{{ $item['description'] }}</td>
                                        <td>{{ $item['description_en'] }}</td>
                                        <td>{{ $item->product_variations->count() == 1
                                            ? number_format($item->product_variations->first()->price) . 'đ'
                                            : number_format($item->product_variations->min('price')) .
                                                'đ ~ ' .
                                                number_format($item->product_variations->max('price')) . 'đ' }}
                                        </td>
                                        <td class="text-center"><img width="200px"
                                                src="{{ url('img') . '/client/shop/' . $item['image'] }}" alt=""></td>
                                        <td class="text-center">
                                            <a class="btn btn-warning"
                                                href="{{ route('admin.product.show_edit', ['id' => $item->id]) }}">Sửa</a>
                                            @if (!$item->deleted_at)
                                                <a class="btn btn-danger"
                                                    onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn ẩn sản phẩm {{ $item->name }} chứ?')) { window.location.href = '{{ route('admin.product.delete', ['id' => $item->id]) }}'; }"
                                                    > Nhấn để ẩn </a>
                                            @endif
                                            @if ($item->deleted_at)
                                                <a class="btn btn-info"
                                                onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn hiện sản phẩm {{ $item->name }} chứ?')) { window.location.href = '{{ route('admin.product.restore', ['id' => $item->id]) }}'; }"
                                                    > Khôi phục </a>
                                            @endif
                                            <a class="btn btn-info"
                                                href="{{ route('admin.product.show_detail', ['id' => $item->id]) }}">Chi
                                                tiết</a>
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
