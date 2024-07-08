@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Chi tiết sản phẩm: <strong>{{$productInfo->name}} </strong></h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" href="{{ route('admin.product.show_add_detail') }}">Thêm sản phẩm</a>

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
                                    <th>Tên biến thể</th>
                                    <th>Giá</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên biến thể</th>
                                    <th>Giá</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($productInfo->product_variations as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->variation->name }}</td>
                                        <td>{{ $item['price'] }}</td>
                                        <td class="text-center"><a class="btn btn-danger"
                                                href="{{ route('admin.product.show_edit_detail', ['id' => $item->id, 'product_id' => $productInfo->id]) }}"> Sửa
                                            </a> <a class="btn btn-danger"
                                            href="{{ route('admin.product.delete_detail', ['id' => $item->id, 'product_id' => $productInfo->id]) }}"
                                            onclick="confirm('Bạn chắc chắn chứ?')"> Xóa </a>
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
