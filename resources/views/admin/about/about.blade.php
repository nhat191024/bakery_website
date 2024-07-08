@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Quản lý trang About Us</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

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
                                    <th class="col-2">Tiêu đề</th>
                                    <th class="col-6">Nội dung</th>
                                    <th class="col-3">Ảnh</th>
                                    <th class="col-1">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="col-2">Tiêu đề</th>
                                    <th class="col-7">Nội dung</th>
                                    <th class="col-2">Ảnh</th>
                                    <th class="col-1">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>{{ $aboutInfo->title }}</td>
                                    <td>{{ $aboutInfo->description }}</td>
                                    <td class="text-center"><img width="200px"
                                            src="{{ url('img') . '/' . $aboutInfo['image'] }}" alt=""></td>
                                    <td class="text-center"><a class="btn btn-warning"
                                            href="{{ route('admin.about.show_edit', ['id' => $aboutInfo->id]) }}">Sửa</a></td>
                                </tr>
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
