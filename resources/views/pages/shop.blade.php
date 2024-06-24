@extends('layouts.app')


@section('content')
    <!-- Begin Li's Breadcrumb Area -->

    @if (session('success'))
        <h6 class="alert alert-success" style="font-weight: normal; font-size: 13px;">{{ session('success') }}</h6>
    @endif

    @if (session('error'))
        <h6 class="alert alert-danger" style="font-weight: normal; font-size: 13px">{{ session('error') }}</h6>
    @endif

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Li's Banner Area -->
                    <div class="single-banner shop-page-banner">
                        <a href="#">
                            <img src="images/bg-banner/2.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                    <!-- Li's Banner Area End Here -->
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-30">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active" role="presentation"><a aria-selected="true" class="active show"
                                            data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i
                                                class="fa fa-th"></i></a></li>
                                    <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view"
                                            href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Showing 1 to 9 of 15</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sort By:</p>
                                <select class="nice-select">
                                    <option value="trending">Relevance</option>
                                    <option value="sales">Name (A - Z)</option>
                                    <option value="sales">Name (Z - A)</option>
                                    <option value="rating">Price (Low &gt; High)</option>
                                    <option value="date">Rating (Lowest)</option>
                                    <option value="price-asc">Model (A - Z)</option>
                                    <option value="price-asc">Model (Z - A)</option>
                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row">

                                        @unless (count($shop) == 0)
                                            @foreach ($shop as $items)
                                                <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a
                                                                href="{{ route('item-info', ['name' => $items->item_name, 'id' => $items->id]) }}">
                                                                <img src="{{ asset('storage/' . $items->item_image) }}"
                                                                    alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a
                                                                            href="product-details.html">{{ $items->item_category }}</a>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                                            </li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name"
                                                                        href="single-product.html">{{ $items->item_name }}</a>
                                                                </h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">${{ $items->item_price_new }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">

                                                                    <li class="add-cart active"><a id="addToCartBtn" class="add-to-cart" style="cursor: pointer;"
                                                                            data-id="{{ $items->id }}"
                                                                            data-item_name="{{ $items->item_name }}"
                                                                            data-item_image="{{ $items->item_image }}"
                                                                            data-item_price_old="{{ $items->item_price_old }}"
                                                                            data-item_price_new="{{ $items->item_price_new }}"
                                                                            data-item_category="{{ $items->item_category }}"
                                                                            data-item_description = "{{ $items->item_description }}">Add
                                                                            to cart</a>
                                                                    </li>

                                                                    <li><a href="#" title="quick view"
                                                                            class="quick-view-btn" data-toggle="modal"
                                                                            data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>

                                                                    <li><a class="addToWishListBtn links-details" id="addToWishListBtn"
                                                                        data-id="{{$items->id}}"
                                                                        data-item_name="{{$items->item_name}}"
                                                                        data-item_image="{{ $items->item_image }}"
                                                                        data-item_price_new="{{$items->item_price_new}}"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    </li>

                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            @endforeach
                                        @endunless
                                    </div>
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane product-list-view fade" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        <div class="row product-layout-list">
                                            <div class="col-lg-3 col-md-5 ">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img src="images/product/large-size/12.jpg"
                                                            alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-7">
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="product-details.html">Graphic Corner</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <h4><a class="product_name" href="single-product.html">Hummingbird
                                                                printed t-shirt</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">$46.80</span>
                                                        </div>
                                                        <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360
                                                            R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite
                                                            Sound via Ring Radiator Technology. Stream And Control R3
                                                            Speakers Wirelessly With Your Smartphone. Sophisticated, Modern
                                                            Desig</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="shop-add-action mb-xs-30">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart"><a href="#">Add to cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                        <li><a class="quick-view" data-toggle="modal"
                                                                data-target="#exampleModalCenter" href="#"><i
                                                                    class="fa fa-eye"></i>Quick view</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <div class="paginatoin-area">
        {{ $shop->links('vendor.pagination.bootstrap-5') }}
    </div>
    </div>
    <!-- Content Wraper Area End Here -->
@endsection
