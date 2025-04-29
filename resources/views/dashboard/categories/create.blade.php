@extends('layouts.dashboard')
@section('title', 'Create Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item"><a href="#">Create Categories</a></li>

@endsection
@section('content')

    <!--begin::App Content-->

    <div class="app-content">

        <div class="container-fluid">

            <form action="{{ route('dashboard.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="parent_id" class="form-label">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">Primary Category</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Description</label>
                    <textarea type="text" name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group  mb-4">
                    <label for="" class="form-label">Status</label>
                    <div class="form-check">
                        <input type="radio" name="status" value="active" class="form-check-input" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="status" value="archived" class="form-check-input">
                        <label class="form-check-label">Archived</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
