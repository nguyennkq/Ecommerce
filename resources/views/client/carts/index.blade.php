@extends('client.layouts.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid">
        <div class="d-inline-flex px-xl-5">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Cart</p>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Subtotal</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="cart">

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="" id="couponBox">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code" id="coupon_name">
                        <div class="input-group-append">
                            <a type="submit" onclick="applyCoupon()" class="btn btn-primary">Apply Coupon</a>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div id="calculation" class="card-body">

                    </div>
                    <a class="btn btn-block btn-primary my-3 py-3" href="{{route('checkout')}}">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
