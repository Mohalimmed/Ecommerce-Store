@extends('layouts.dashboard')
@section('title', 'Home')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="#">Docs</a></li>
@endsection
@section('content')
    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="callout callout-info mb-4">
                <h5 class="fw-bold">Tips</h5>
                <p>
                    The
                    <a href="/starter.html" target="_blank" rel="noopener noreferrer" class="callout-link">
                        starter page
                    </a>
                    is a good place to start building your app if you’d like to start from scratch.
                </p>
            </div>
            <p>The layout consists of five major parts:</p>
            <ul>
                <li>Wrapper <code>.app-wrapper</code> . A div that wraps the whole site.</li>
                <li>Main Header <code>.app-header</code> . Contains the logo and navbar.</li>
                <li>
                    Main Sidebar <code>.app-sidebar</code> . Contains the sidebar user panel and menu.
                </li>
                <li>Content <code>.app-main</code> . Contains the page header and content.</li>
                <li>Main Footer <code>.app-footer</code> . Contains the footer.</li>
            </ul>
            <h4>Layout Options</h4>
            <p>
                AdminLTE v4 provides a set of options to apply to your main layout. Each one of these
                classes can be added to the
                <code>body</code> tag to get the desired goal.
            </p>
            <ul>
                <li>
                    Fixed Sidebar: use the class <code>.layout-fixed</code> to get a fixed sidebar.
                </li>
                <li>
                    Mini Sidebar on Toggle: use the class
                    <code>.sidebar-expand-* .sidebar-mini</code>
                    to have a collapsed sidebar upon loading.
                </li>
                <li>
                    Collapsed Sidebar: use the class
                    <code>.sidebar-expand-* .sidebar-mini .sidebar-collapse</code> to have a collapsed
                    sidebar upon loading.
                </li>
            </ul>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!--end::App Content-->
@endsection
