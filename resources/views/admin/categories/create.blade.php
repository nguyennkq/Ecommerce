@extends('admin.admin_main')
@section('main')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm danh mục</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.store')}}" data-toggle="validator" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" name="category_name" class="form-control" placeholder="Nhập tên danh mục...">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Thêm danh mục</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection
