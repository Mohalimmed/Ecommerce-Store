@extends('layouts.dashboard')
@section('title', 'Edit Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item"><a href="#"> Edit Categories</a></li>

@endsection
@section('content')

    <!--begin::App Content-->

    <div class="app-content">

        <div class="container-fluid">

            <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')


                @include('dashboard.categories._form', [
                    'button' => 'Update',
                    'category' => $category,
                ])
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
