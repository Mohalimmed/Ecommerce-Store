@extends('layouts.dashboard')
@section('title', 'Edit Profile')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#"> Edit Profile</a></li>

@endsection
@section('content')

    <!--begin::App Content-->

    <div class="app-content">

        <div class="container-fluid">
            <x-alert />
            <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row mb-3">
                    <div class="col-md-6 ">
                        <x-form.input name="first_name" label="First Name" :value="$user->profile->first_name" />
                    </div>
                    <div class="col-md-6">
                        <x-form.input name="last_name" label="Last Name" :value="$user->profile->last_name" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <x-form.input name="birthday" type="date" label="Birthday" :value="$user->profile->birthday" />
                    </div>
                    <div class="col-md-6">
                        <x-form.radio name="gender" label="Gender" :options="['male' => 'Male', 'female' => 'Female']" :checked="$user->profile->gender" />
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <x-form.input name="street_address" label="Street Address" :value="$user->profile->street_address" />
                        </div>
                        <div class="col-md-4">
                            <x-form.input name="city" label="City" :value="$user->profile->city" />
                        </div>
                        <div class="col-md-4">
                            <x-form.input name="state" label="State" :value="$user->profile->state" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <x-form.input name="postal_code" label="Postal Code" :value="$user->profile->postal_code" />
                        </div>
                        <div class="col-md-4">
                            <x-form.select name="country" label="Country" :options="$countries" :selected="$user->profile->country" />
                        </div>
                        <div class="col-md-4">
                            <x-form.select name="locale" label="Languages" :options="$locales" :selected="$user->profile->locale" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-primary w-50" type="submit">Save</button>
                        </div>
                    </div>


            </form>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
