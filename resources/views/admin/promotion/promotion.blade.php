@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Quản lý băng rôn SP (Promotion)</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
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
                                    <th>Tên SP hiển thị</th>
                                    <th>Mô tả</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên SP hiển thị</th>
                                    <th>Mô tả</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                {{-- @foreach ($accessories as $item) --}}
                                    <tr>
                                        <td>{{ $promotion->Products->categories->name . ' - ' . $promotion->Products->name }}</td>
                                        <td>{{ $promotion->description }}</td>
                                        <td>{{ \Carbon\Carbon::parse($promotion->start_time)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($promotion->end_time)->format('d-m-Y') }}</td>
                                        {{-- <td>{{ number_format($promotion->price, 0, ',', '.')}}đ</td> --}}
                                        <td class="text-center"><a class="btn btn-warning"
                                                href="{{ route('admin.promotion.edit', ['id' => $promotion->id]) }}">Sửa</a>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
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
