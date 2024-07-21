@extends('admin.master')
@section('main')
    <!-- Content Wrapper -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Chi tiết tin nhắn - {{'Đã gửi ' . $helper::getTimePassedBy($messageInfo['created_at']) }}</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="form-group">
                        <label for=""><b>Tên</b></label>
                        <p>{{ $messageInfo['name'] }}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Email</b></label>
                        <p>{{ $messageInfo['email'] }}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Tiêu đề</b></label>
                        <p>{{ $messageInfo['subject'] }}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Nội dung</b></label>
                            <p >{{ $messageInfo['message'] }}</p>
                        </div>
                        <p><i><b>{{'Đã gửi ' . $helper::getTimePassedBy($messageInfo['created_at']) }}</b></i></p>

                        <input type="hidden" name="id" value="{{ $messageInfo['id'] }}">
                        <a class="btn btn-primary mt-4" onclick="history.back()">Quay lại</a>
                        <a class="btn btn-success mt-4" href="{{ route('admin.message.delete', ['id' => $messageInfo['id']]) }}"
                                                >Đánh dấu là đã đọc</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- End of Content Wrapper -->
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
