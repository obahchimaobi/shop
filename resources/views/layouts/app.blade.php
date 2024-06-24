<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Limupa - @yield('title', 'Digital Products Store eCommerce')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('images/favicon.png') }}">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="{{ url('css/material-design-iconic-font.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{ url('css/fontawesome-stars.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ url('css/meanmenu.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{ url('css/slick.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{ url('css/jquery-ui.min.css') }}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ url('css/venobox.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ url('css/nice-select.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ url('css/helper.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}">
    <!-- Modernizr js -->
    <script src="{{ url('js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="{{ url('http://browsehappy.com/') }}">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">

        @include('layouts._header')

        @yield('content')

        @include('layouts._footer')

    </div>
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    <script src="{{ url('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ url('js/vendor/popper.min.js') }}"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <!-- Ajax Mail js -->
    <script src="{{ url('js/ajax-mail.js') }}"></script>
    <!-- Meanmenu js -->
    <script src="{{ url('js/jquery.meanmenu.min.js') }}"></script>
    <!-- Wow.min js -->
    <script src="{{ url('js/wow.min.js') }}"></script>
    <!-- Slick Carousel js -->
    <script src="{{ url('js/slick.min.js') }}"></script>
    <!-- Owl Carousel-2 js -->
    <script src="{{ url('js/owl.carousel.min.js') }}"></script>
    <!-- Magnific popup js -->
    <script src="{{ url('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope js -->
    <script src="{{ url('js/isotope.pkgd.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ url('js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Mixitup js -->
    <script src="{{ url('js/jquery.mixitup.min.js') }}"></script>
    <!-- Countdown -->
    <script src="{{ url('js/jquery.countdown.min.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ url('js/jquery.counterup.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ url('js/waypoints.min.js') }}"></script>
    <!-- Barrating -->
    <script src="{{ url('js/jquery.barrating.min.js') }}"></script>
    <!-- Jquery-ui -->
    <script src="{{ url('js/jquery-ui.min.js') }}"></script>
    <!-- Venobox -->
    <script src="{{ url('js/venobox.min.js') }}"></script>
    <!-- Nice Select js -->
    <script src="{{ url('js/jquery.nice-select.min.js') }}"></script>
    <!-- ScrollUp js -->
    <script src="{{ url('js/scrollUp.min.js') }}"></script>
    <!-- Main/Activator js -->
    <script src="{{ url('js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.add-to-cart', function(e) {
                e.preventDefault(); // Prevent default button action

                // Retrieve item data from button attributes
                var itemId = $(this).data('id');
                var itemName = $(this).data('item_name');
                var itemImage = $(this).data('item_image');
                var itemPriceOld = $(this).data('item_price_old');
                var itemPriceNew = $(this).data('item_price_new');
                var itemCategory = $(this).data('item_category');
                var itemDescription = $(this).data('item_description');

                // AJAX request to server
                $.ajax({
                    url: '{{ route('cart.add') }}', // Update with your actual route
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF token for Laravel
                        id: itemId,
                        name: itemName,
                        image: itemImage,
                        price_old: itemPriceOld,
                        price_new: itemPriceNew,
                        category: itemCategory,
                        description: itemDescription
                    },
                    success: function(response) {
                        // Handle success (e.g., notify user, update cart UI)
                        if (response.alreadyInCart) {
                            Swal.fire({
                                title: 'Notice!',
                                text: 'Item is already in your cart so we increased the quantity!',
                                icon: 'info',
                                confirmButtonText: 'OK'

                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Refresh the page
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Item added to cart successfully!',
                                icon: 'success',
                                confirmButtonText: 'OK'

                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Refresh the page
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function(error) {
                        // Handle error
                        console.log(error);
                        alert('Error adding item to cart.');
                    }
                });
            });

            $(document).on('click', '.addToWishListBtn', function(e) {
                e.preventDefault(); // Prevent default button action

                // Retrieve item data from button attributes
                var itemId = $(this).data('id');
                var itemName = $(this).data('item_name');
                var itemImage = $(this).data('item_image');
                var itemPriceNew = $(this).data('item_price_new');

                // AJAX request to server
                $.ajax({
                    url: '{{ route('wishlist.add') }}', // Update with your actual route
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF token for Laravel
                        wishlist_id: itemId,
                        wishlist_name: itemName,
                        wishlist_image: itemImage,
                        wishlist_price: itemPriceNew
                    },
                    success: function(response) {
                        // Handle success (e.g., notify user, update cart UI)
                        if (response.alreadyInWishlist) {
                            Swal.fire({
                                title: 'Notice!',
                                text: 'Item is already in your wishlist!',
                                icon: 'info',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            // Handle success (e.g., notify user, update wishlist UI)
                            Swal.fire({
                                title: 'Success!',
                                text: 'Item has been added to wishlist!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Refresh the page
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function(error) {
                        // Handle error
                        // console.log(error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error adding item to wishlist!',
                            icon: 'error',
                            confirmButtonText: 'OK'

                        });
                    }
                });
            });

            $(document).on('click', '.removeItem', function(e) {
                e.preventDefault();

                var itemId = $(this).data('id');

                $.ajax({
                    url: '{{ route('cart.remove') }}',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                        'content'), // CSRF token for Laravel
                        _method: 'DELETE', // Simulate DELETE request
                        id: itemId,
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Item has been deleted',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Refresh the page
                                location.reload();
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error removing item from cart!',
                            icon: 'error',
                            confirmButtonText: 'OK'

                        });
                    }
                });
            });

        });
    </script>
</body>

<!-- index30:23-->

</html>
