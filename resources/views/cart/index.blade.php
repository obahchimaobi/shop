<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Shopping Cart</h1>
    <ul id="cart">
        @foreach($cart as $id => $item)
            <li>
                {{ $item['item_name'] }} - {{ $item['item_price_new'] }} - Quantity: {{ $item['item_quantity'] }}
                <button class="remove-from-cart" data-id="{{ $id }}">Remove</button>
            </li>
        @endforeach
    </ul>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart').click(function(e) {
                e.preventDefault();

                var id = $(this).data('id');
                var name = $(this).data('name');
                var price = $(this).data('price');
                var quantity = $(this).data('quantity');

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id,
                        name: name,
                        price: price,
                        quantity: quantity
                    },
                    success: function(response) {
                        // Update the cart UI
                        // This is just a simple example. You might want to update the cart contents dynamically.
                        $('#cart').empty();
                        $.each(response, function(id, item) {
                            $('#cart').append('<li>' + item.name + ' - ' + item.price + ' - Quantity: ' + item.quantity + '<button class="remove-from-cart" data-id="' + id + '">Remove</button></li>');
                        });
                    }
                });
            });

            $(document).on('click', '.remove-from-cart', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('cart.remove') }}",
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id
                    },
                    success: function(response) {
                        // Update the cart UI
                        $('#cart').empty();
                        $.each(response, function(id, item) {
                            $('#cart').append('<li>' + item.name + ' - ' + item.price + ' - Quantity: ' + item.quantity + '<button class="remove-from-cart" data-id="' + id + '">Remove</button></li>');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
