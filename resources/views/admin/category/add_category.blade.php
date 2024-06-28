@extends('admin.layout.master')
@section('main')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm danh mục</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post" action="{{ route('admin.category.add') }}">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Tên danh mục</label>
                        <input required type="text" class="form-control" id="category_name" name="category_name"
                            placeholder="Nhập tên danh mục">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
