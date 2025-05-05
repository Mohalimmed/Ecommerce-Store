@extends('layouts.dashboard')
@section('title', $category->name)

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item"><a href="#"> {{ $category->name }}</a></li>

@endsection
@section('content')

    <!--begin::App Content-->

    <div class="app-content">

        <div class="container-fluid">

            <table class="table table-striped table-bordered table-hover" id="products-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Store</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $products = $category->products()->with('store')->paginate(5);
                    @endphp
                    @forelse ($products as $product)
                        <tr>
                            <td> <img src="{{ asset("storage/$product->image") }}" alt="" height="50">
                            </td>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->store->name }}</td>
                            <td>{{ $product->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No products found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $products->withQueryString()->links() }}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
