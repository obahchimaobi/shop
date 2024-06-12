@php
    use App\Http\Controllers\UserController;
@endphp

@extends('layouts.app')

@section('title')
    Cart
@endsection

@section('content')

    @if (session('success'))
        <h6 class="alert alert-success" style="font-size: 14px; font-weight: normal;">{{ session('success') }}</h6>
    @endif

    @if (session('error'))
        <h6 class="alert alert-danger" style="font-size: 14px; font-weight: normal;">{{ session('error') }}</h6>
    @endif
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
<<<<<<< HEAD
                                    <th class="li-product-subtotal">Total</th>
=======
                                    <th class="li-product-subtotal">Update</th>
>>>>>>> my-feature-branch
                                </tr>
                            </thead>
                            <tbody>

                                @unless (count($cart) == 0)
                                    @foreach ($cart as $cartItem)
                                        <tr>
<<<<<<< HEAD
                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a>
                                            </td>
                                            <td class="li-product-thumbnail"><a href="#"><img
                                                        src="{{ asset('storage/' . $cartItem->cart_image) }}"
                                                        alt="Li's Product Image" style="width: 100px; height: 100px;"></a>
                                            </td>
                                            <td class="li-product-name"><a href="#">{{ $cartItem->cart_name }}</a>
                                            </td>
                                            <td class="li-product-price"><span
                                                    class="amount">${{ $cartItem->cart_price }}</span></td>

                                            <form action="{{ route('cart.update', ['id' => $cartItem->id]) }}" method="post">
=======
                                            <td class="li-product-remove"><a
                                                    href="{{ route('remove-from-cart', ['id' => $cartItem->id]) }}" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-times text-white"></i></a>
                                            </td>
                                            <td class="li-product-thumbnail"><a href="#"><img src="{{ asset('storage/' . $cartItem->cart_image) }}" alt="Li's Product Image" style="width: 100px; height: 100px;"></a>
                                            </td>
                                            <td class="li-product-name"><a href="#" class="text-dark">{{ $cartItem->cart_name }}</a>
                                            </td>
                                            <td class="li-product-price"><span class="amount">${{ $cartItem->cart_price }}</span></td>

                                            <form action="{{ route('update-cart', ['id'=>$cartItem->id]) }}" method="post">
>>>>>>> my-feature-branch

                                                {{ csrf_field() }}
                                                <td class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
<<<<<<< HEAD
                                                        <input class="cart-plus-minus-box"
                                                            value="{{ $cartItem->item_quantity }}" type="text"
                                                            name="item_quantity">

=======
                                                        <input class="cart-plus-minus-box" min="1"
                                                            value="{{ $cartItem->item_quantity }}" name="quantity"
                                                            type="number" autocomplete="off" required>
>>>>>>> my-feature-branch
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>
<<<<<<< HEAD
                                                <td class="product-subtotal"><input class="button btn btn-dark"
                                                        name="update_cart" value="Update cart" type="submit">
=======
                                                <td class="product-subtotal"><button
                                                        class="btn btn-dark btn-md p-2 pr-20 pl-20" style="font-weight: bold; font-size: 13px; border-radius: 0%">UPDATE</button>
>>>>>>> my-feature-branch
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                @endunless
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
<<<<<<< HEAD
                                    <li>Subtotal <span>$130.00</span></li>
                                    <li>Total <span>$130.00</span></li>
=======
                                    @if (Auth::check())
                                        <li>Subtotal <span>${{ UserController::class::total_price() }}</span></li>
                                    @else
                                        <li>Subtotal <span>$0</span></li>
                                    @endif

                                    @if (Auth::check())
                                        <li>Total <span>${{ UserController::class::total_price() }}</span></li>
                                    @else
                                        <li>Total <span>$0</span></li>
                                    @endif
>>>>>>> my-feature-branch
                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
@endsection
