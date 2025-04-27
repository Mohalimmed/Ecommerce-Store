@extends('layouts.dashboard')
@section('title', 'Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
@endsection
@section('content')
    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <table class="table table-striped table-bordered table-hover" id="categories-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Created At</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td></td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('dashboard.categories.edit', $category) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No categories found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
