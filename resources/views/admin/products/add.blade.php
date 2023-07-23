@extends('admin.admin_main')
@section('main')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.add') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control" data-style="py-0">
                                            <option></option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" @if(old('category_id') == $item->id) selected @endif>{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="product_name" type="text" class="form-control" value="{{old('product_name')}}">
                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input name="product_quantity" type="number" class="form-control" value="{{old('product_quantity')}}">
                                        @error('product_quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input name="product_size" type="text" class="form-control visually-hidden"
                                            data-role="tagsinput" value="S,M,L" value="{{old('product_size')}}">
                                        @error('product_size')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Color</label>
                                        <input name="product_color" type="text" class="form-control visually-hidden"
                                            data-role="tagsinput" value="Black, White" value="{{old('product_color')}}">
                                        @error('product_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Selling Price</label>
                                        <input name="selling_price" type="number" class="form-control" value="{{old('selling_price')}}">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount Price</label>
                                        <input name="discount_price" type="number" class="form-control" value="{{old('discount_price')}}">
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input id="image" type="file"
                                            class="form-control image-file @error('product_image') is-invalid @enderror"
                                            name="product_image" accept="image/*">
                                        <img id="image_preview"
                                            src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                                            alt="" width="100px">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Product</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection
