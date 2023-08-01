@extends('admin.admin_main')
@section('main')
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Coupon</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('coupon.edit', ['id' => $detail->id]) }}" data-toggle="validator"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Coupon Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $detail->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type" class="col-form-label">Type</label>
                                        <select name="type" class="form-control">
                                            <option value="fixed" {{ $detail->type == 'fixed' ? 'selected' : '' }}>Fixed
                                            </option>
                                            <option value="percent" {{ $detail->type == 'percent' ? 'selected' : '' }}>
                                                Percent</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="number" name="discount" class="form-control"
                                            value="{{ $detail->discount }}">
                                        @error('discount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" id="start_date" name="start_date" class="form-control"
                                            value="{{ $detail->start_date }}"
                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" />
                                        @error('start_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control"
                                            value="{{ $detail->end_date }}"
                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" />
                                        @error('end_date')
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
