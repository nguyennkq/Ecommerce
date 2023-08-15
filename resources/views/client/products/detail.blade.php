@extends('client.layouts.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid">
        <div class="d-inline-flex px-xl-5">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Product Detail</p>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        @foreach ($multiImage as $key => $item)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img class="w-100"
                                    src="{{ $item->image ? Storage::url($item->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                    alt="Image" height="400px">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-primary"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-primary"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold" id="name">{{ $product_detail->product_name }}</h3>
                <input type="hidden" id="product_id" value="{{ $product_detail->id }}">
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <div class="d-flex">
                    <h3 class="font-weight-semi-bold mb-4">${{ $product_detail->discount_price }}</h3>
                    <h6 class="text-muted ml-2"><del>${{ $product_detail->selling_price }}</del></h6>
                </div>
                <p class="mb-4">{{ $product_detail->description }}</p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    @if ($product_detail->product_size)
                        @php
                            $sizes = explode(',', $product_detail->product_size);
                        @endphp
                        @foreach ($sizes as $index => $size)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-{{ $index }}"
                                    name="size" value="{{$size}}">
                                <label class="custom-control-label"
                                    for="size-{{ $index }}">{{ $size }}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    @if ($product_detail->product_color)
                        @php
                            $colors = explode(',', $product_detail->product_color);
                        @endphp
                        @foreach ($colors as $index => $color)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="color-{{$index}}" name="color" value="{{$color}}">
                                <label class="custom-control-label" for="color-{{$index}}">{{ $color }}</label>
                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1" id="quantity">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button onclick="addToCart({{ $product_detail->id }})" class="btn btn-primary px-3"><i
                            class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
@endsection
