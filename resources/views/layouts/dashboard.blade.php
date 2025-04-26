<!doctype html>
<html lang="en">
<!--begin::Head-->

@include('layouts.partials.header')
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        @include('layouts.partials.header-nav')
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="../index.html" class="brand-link">
                    <!--begin::Brand Image-->
                    <img src="../../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow" />
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">{{ config('app.name') }}</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->


            <!--begin::Sidebar Wrapper-->
            @include('layouts.partials.nav')
            <!--end::Sidebar Wrapper-->


        </aside>
        <!--end::Sidebar-->

        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('title')</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                @section('breadcrumb')
                                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                                @show

                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->
            <!--begin::App Main-->
            @yield('content')
            <!--end::App Main-->
        </main>

        <!--begin::Footer-->
        @include('layouts.partials.footer')
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    @include('layouts.partials.scripts')
    <!--end::Script-->
</body>
<!--end::Body-->

</html>
