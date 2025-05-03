<div class="sidebar-wrapper">
    <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

            @foreach ($items as $item)
                <li class="nav-item">
                    <a href="{{ route($item['route']) }}"
                        class="nav-link {{ Route::is($item['active']) ? 'active' : '' }}">
                        <i class="{{ $item['icon'] }}"></i>
                        <p>
                            {{ $item['name'] }}
                            @if (isset($item['badge']))
                                <span class="right badge badge-danger" style="color: red"> {{ $item['badge'] }} </span>
                            @endif

                            {{-- <i class="nav-arrow bi bi-chevron-right"></i> --}}
                        </p>
                    </a>
                </li>
            @endforeach





        </ul>
        <!--end::Sidebar Menu-->
    </nav>
</div>
