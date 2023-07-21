@extends('admin.admin_main')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách danh mục</h4>
                    </div>
                    <a href="{{ route('category.add') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add
                        Category</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable" class="table data-tables table-striped">
                        <thead>
                            <tr class="ligth">
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->category_slug }}</td>
                                    <td><img width="100px" height="100px"
                                            src="{{ $item->category_image ? Storage::url($item->category_image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                            alt=""></td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a href="{{ route('category.edit', ['id' => $item->id]) }}"
                                                class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Edit" href="#"><i
                                                    class="ri-pencil-line mr-0"></i></a>
                                            <a href="{{ route('category.delete', ['id' => $item->id]) }}"
                                                class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Delete" href="#"><i
                                                    class="ri-delete-bin-line mr-0"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection
