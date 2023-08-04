@extends('admin.admin_main')
@section('main')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Permission</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permission.edit', ['id' => $detail->id]) }}" data-toggle="validator"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permission Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $detail->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Group Name</label>
                                        <select name="group_name" class="form-control">
                                            <option selected="" disabled="">Select Group</option>
                                            <option value="Category"
                                                {{ $detail->group_name == 'Category' ? 'selected' : '' }}>Category</option>
                                            <option value="Product"
                                                {{ $detail->group_name == 'Product' ? 'selected' : '' }}>Product</option>
                                            <option value="Banner"
                                                {{ $detail->group_name == 'Banner' ? 'selected' : '' }}>Banner</option>
                                            <option value="Coupon"
                                                {{ $detail->group_name == 'Coupon' ? 'selected' : '' }}>Coupon</option>
                                            <option value="Role"
                                                {{ $detail->group_name == 'Role' ? 'selected' : '' }}>Role</option>
                                            <option value="Permission"
                                                {{ $detail->group_name == 'Permission' ? 'selected' : '' }}>Permission
                                            </option>
                                            <option value="Setting"
                                                {{ $detail->group_name == 'Setting' ? 'selected' : '' }}>Setting</option>
                                        </select>
                                        @error('group_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
