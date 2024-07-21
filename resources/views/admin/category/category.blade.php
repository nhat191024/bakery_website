@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" href="{{ route('admin.category.show_add') }}">Thêm danh mục</a>

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
                                    <th>Tên danh mục (Tiếng Việt)</th>
                                    <th>Tên danh mục (Tiếng Anh)</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục (Tiếng Việt)</th>
                                    <th>Tên danh mục (Tiếng Anh)</th>
                                    <th>Chức năng</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($allCategory as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['name_en'] }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" href="{{route('admin.category.show_edit', ['id' => $item->id])}}">
                                                Sửa
                                            </a>
                                            <a class="btn btn-danger" onclick="event.preventDefault(); if (confirm('Bạn chắc chắn muốn xoá danh mục: {{ $item->name }}?\nLƯU Ý: Nếu trong danh mục này còn tồn tại sản phẩm, việc xoá sẽ không thể thực hiện!')) { window.location.href = '{{route('admin.category.delete', ['id' => $item->id])}}'; }">
                                                Xoá
                                            </a>

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
