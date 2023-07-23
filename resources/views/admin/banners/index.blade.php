@extends('admin.admin_main')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">List Banner</h4>
                    </div>
                    <a href="{{ route('banner.add') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add
                        Banner</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable" class="table data-tables table-striped">
                        <thead>
                            <tr class="ligth">
                                <th>#</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banner as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->banner_title }}</td>
                                    <td>{{ $item->banner_url }}</td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td><img width="100px" height="100px"
                                            src="{{ $item->banner_image ? Storage::url($item->banner_image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                            alt=""></td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            @if ($item->status == 'inactive')
                                                <a href="{{ route('banner.inactive', ['id' => $item->id]) }}"
                                                    class="badge bg-primary mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Active" href="#"><i
                                                        class="fa-solid fa-thumbs-up"></i></a>
                                            @else
                                                <a href="{{ route('banner.active', ['id' => $item->id]) }}"
                                                    class="badge bg-primary mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Inactive" href="#"><i
                                                        class="fa-solid fa-thumbs-down"></i></a>
                                            @endif
                                            <a href="{{ route('banner.edit', ['id' => $item->id]) }}"
                                                class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Edit" href="#"><i
                                                    class="ri-pencil-line mr-0"></i></a>
                                            <a id="delete" href="{{ route('banner.delete', ['id' => $item->id]) }}"
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
