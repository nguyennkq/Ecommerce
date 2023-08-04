@extends('admin.admin_main')
@section('main')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Permission</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permission.add') }}" data-toggle="validator" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permission Name</label>
                                        <input type="text" name="name" class="form-control">
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
                                            <option value="Category">Category</option>
                                            <option value="Product">Product</option>
                                            <option value="Banner">Banner</option>
                                            <option value="Coupon">Coupon</option>
                                            <option value="Role">Role</option>
                                            <option value="Permission">Permission</option>
                                            <option value="Setting">Setting</option>
                                        </select>
                                        @error('group_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
