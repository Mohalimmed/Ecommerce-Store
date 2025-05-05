@extends('layouts.dashboard')
@section('title', 'Products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Products</a></li>

@endsection
@section('content')
    <!--begin::App Content-->

    <div class="app-content">

        <div class="container-fluid">

            <div class="mb-4">
                <a href="{{ route('dashboard.products.create') }}" class="btn btn-outline-primary me-3">create</a>

            </div>

            <x-alert />
            <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">

                <x-form.input name="search" placeholder="Name" class="mx-2" :value="request('search')" />

                <select name="status" class="form-control mx-2">
                    <option value="">All</option>
                    <option value="active" @selected(request('status') == 'active')>Active</option>
                    <option value="archived"@selected(request('status') == 'archived')>Archived</option>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <table class="table table-striped table-bordered table-hover" id="products-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Store</th>
                        <th>Created At</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td> <img src="{{ asset("storage/$product->image") }}" alt="" height="50">
                            </td>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->store->name }}</td>
                            <td>{{ $product->created_at->format('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('dashboard.products.edit', $product->id) }}"
                                    class="btn btn-primary me-3">Edit</a>
                                <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No products found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $products->withQueryString()->links() }}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!--end::App Content-->
    @endsection
