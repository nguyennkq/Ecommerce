@extends('admin.admin_main')
@section('main')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.edit', ['id' => $detail->id]) }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control" data-style="py-0">
                                            <option></option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $detail->category_id ? 'selected' : '' }}>
                                                    {{ $item->category_name }}</option>
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
                                        <input name="product_name" type="text" class="form-control"
                                            value="{{ $detail->product_name }}">
                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input name="product_quantity" type="number" class="form-control"
                                            value="{{ $detail->product_quantity }}">
                                        @error('product_quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input name="product_size" type="text" class="form-control visually-hidden"
                                            data-role="tagsinput" value="{{ $detail->product_size }}">
                                        @error('product_size')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Color</label>
                                        <input name="product_color" type="text" class="form-control visually-hidden"
                                            data-role="tagsinput" value="{{ $detail->product_color }}">
                                        @error('product_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Selling Price</label>
                                        <input name="selling_price" type="number" class="form-control"
                                            value="{{ $detail->selling_price }}">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount Price</label>
                                        <input name="discount_price" type="number" class="form-control"
                                            value="{{ $detail->discount_price }}">
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
                                            src="{{ $detail->product_image ? Storage::url($detail->product_image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                            alt="" width="100px">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{ $detail->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Update Multi Image </h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Change Image </th>
                                <th scope="col">Delete </th>
                            </tr>
                        </thead>
                        <tbody>

                            <form method="post" action="{{ route('edit.image') }}" enctype="multipart/form-data">
                                @csrf
                                @foreach ($multiImgs as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td> <img
                                                src="{{ $item->image ? Storage::url($item->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                                style="width:70; height: 40px;"></td>
                                        <td> <input type="file" class="form-group" name="image[{{ $item->id }}]">
                                        </td>
                                        <td>
                                            <input type="submit" class="btn btn-primary px-4" value="Update Image " />
                                            <a id="delete" href="{{ route('delete.image', ['id' => $item->id]) }}" class="btn btn-danger" id="delete">
                                                Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
