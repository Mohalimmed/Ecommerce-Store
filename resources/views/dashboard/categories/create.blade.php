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

            <form action="{{ route('dashboard.categories.store') }}" method="POST" enctype="multipart/form-data">
                {{-- enctype="multipart/form-data" is used to upload files --}}
                @csrf

                @include('dashboard.categories._form')
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
