@extends('layouts.dashboard')
@section('title', 'Edit Proudcts')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Prouducts</a></li>
    <li class="breadcrumb-item"><a href="#"> Edit Products</a></li>

@endsection
@section('content')

    <!--begin::App Content-->

    <div class="app-content">

        <div class="container-fluid">

            <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                @include('dashboard.products._form', [
                    'button' => 'Update',
                    'proudct' => $product,
                ])
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
