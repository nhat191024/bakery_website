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
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Thumbnail</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Thumbnail</th>
                                    <th>Chức năng</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($allBlog as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->subtitle }}</td>
                                        <td>{{ $item->thumbnail }}</td>

                                        <td class="text-center">
                                            <a class="btn btn-warning" href="{{ route('admin.blog.showEdit', ['id' => $item->id]) }}">Sửa</a>
                                            <a class="btn btn-danger" href="{{ route('admin.blog.delete', ['id' => $item->id]) }}">Ẩn blog</a>
                                            <a class="btn btn-info" href="{{ route('admin.blog.showDetail', ['id' => $item->id]) }}">Xem chi tiết</a>
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
