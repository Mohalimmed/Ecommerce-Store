@extends('layouts.dashboard')
@section('title', 'Create Products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Products</a></li>
    <li class="breadcrumb-item"><a href="#">Create Products</a></li>

@endsection
@section('content')

    <!--begin::App Content-->

    <div class="app-content">

        <div class="container-fluid">

            <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                {{-- enctype="multipart/form-data" is used to upload files --}}
                @csrf

                @include('dashboard.products._form')
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
