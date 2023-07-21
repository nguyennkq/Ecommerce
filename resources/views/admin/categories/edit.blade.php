@extends('admin.admin_main')
@section('main')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Category</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.edit', ['id' => $detail->id]) }}" data-toggle="validator"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name" class="form-control"
                                            value="{{ $detail->category_name }}">
                                        @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input id="image" type="file"
                                            class="form-control image-file @error('category_image') is-invalid @enderror"
                                            name="category_image" accept="image/*"><br>
                                        <img id="image_preview"
                                            src="{{ $detail->category_image ? Storage::url($detail->category_image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                            alt="" width="100px" height="100px">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection
