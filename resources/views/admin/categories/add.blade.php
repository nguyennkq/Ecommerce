@extends('admin.admin_main')
@section('main')
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
    @endif --}}
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Category</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.add') }}" data-toggle="validator" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name" class="form-control">
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
                                            name="category_image" accept="image/*">
                                        <img id="image_preview"
                                            src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                                            alt="" width="100px">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection
