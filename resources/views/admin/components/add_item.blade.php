@extends('admin.layouts.app')

@section('title')
    Add New Item
@endsection

@section('content')
    <main id="main" class="main">


        <section class="section">
            <div class="col-xl-6 m-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Items for Display</h5>

                        @if (session('success'))
                            <h6 class="alert alert-success" style="font-weight: normal;">{{ session('success') }}</h6>
                        @endif

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ route('admin.add-item-to-cart') }}" method="post"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="item_name" id="floatingName"
                                        placeholder="Item Name" required>
                                    <label for="floatingName">Item Name</label>
                                </div>

                                @error('item_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Item Description" name="item_description" id="floatingTextarea"
                                        style="height: 100px;" required></textarea>
                                    <label for="floatingTextarea">Item Description</label>
                                </div>

                                @error('item_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="item_price_old" id="floatingEmail"
                                        placeholder="Item Price" required>
                                    <label for="floatingEmail">Item Price Old</label>
                                </div>

                                @error('item_price_old')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="item_price_new" id="floatingEmail"
                                        placeholder="Item Price New" required>
                                    <label for="floatingEmail">Item Price New</label>
                                </div>

                                @error('item_price_new')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="floatingPassword" placeholder="Password"
                                        required name="item_image">
                                    <label for="floatingPassword">Item Image</label>
                                </div>

                                @error('item_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingCity" placeholder="City"
                                            required name="item_category">
                                        <label for="floatingCity">Item Cartegory</label>
                                    </div>
                                </div>

                                @error('item_cartegory')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="text-center d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
