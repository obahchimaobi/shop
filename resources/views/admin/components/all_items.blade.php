@extends('admin.layouts.app')

@section('title')
    All Items
@endsection

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Add lightweight datatables to your project with using the <a
                                    href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                    DataTables</a> library.
                                Just add <code>.datatable</code> class name to any table you wish to conver to a datatable.
                                Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/"
                                    target="_blank">more examples</a>.</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>N</b>ame
                                        </th>
                                        <th>Description</th>
                                        <th>Price Old</th>
                                        <th>Price New</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @unless (count($items) == 0)
                                        @foreach ($items as $all)
                                            <tr>
                                                <td>{{ $all->item_name }}</td>
                                                <td>{{ Str::limit($all->item_description, '10', '...') }}</td>
                                                <td>{{ $all->item_price_old }}</td>
                                                <td>{{ $all->item_price_new }}</td>
                                                <td><img src="{{ asset('storage/product_image/' . $all->item_image) }}" alt=""></td>
                                                <td>{{ $all->item_category }}</td>
                                                <td>{{ $all->created_at }}</td>

                                                <td>
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endunless
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
