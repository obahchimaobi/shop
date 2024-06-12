@extends('layouts.app')

@section('content')
    <style>
        .my-account {
            background-color: #f8f8f8;
        }

        .my-account h2,
        .my-account h3 {
            color: #333;
        }

        .list-group-item {
            color: #333;
        }

        .list-group-item:hover {
            background-color: #ffc107;
            color: #fff;
        }

        .form-control {
            border-radius: 0;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
    </style>

    <div class="container">
        <div class="">
            <h3>Account Details</h3>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-warning">Save Changes</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId">
                    Delete Account
                </button>
            </form>

            <!-- Cart Items -->
            <h3 class="mt-50">Cart Items</h3>
            <div class="cart-items">
                <!-- Example Item -->
                @unless (count($item) == 0)
                    @foreach ($item as $items)
                        <div class="cart-item d-flex align-items-center py-2 border-bottom">
                            <img src="{{ asset('storage/' . $items->cart_image) }}" alt="Item" class="img-fluid"
                                width="80">
                            <div class="ml-3">
                                <h5 class="mb-1">Item Name</h5>
                                <p class="mb-1">Price: $123.45</p>
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </div>
                        </div>
                    @endforeach
                @endunless
                <!-- Add more items as needed -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete your account?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="" class="btn btn-primary">Continue</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
