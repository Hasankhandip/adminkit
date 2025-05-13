<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">@lang('AdminKit')</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                @lang('Pages')
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">@lang('Dashboard')</span>
                </a>
            </li>
            <li class="sidebar-item submenu">
                <a data-bs-target="#frontend-submenu" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">@lang('Manage Frontend')</span>
                </a>
                <ul id="frontend-submenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

                    <!-- Manage Content Submenu -->
                    <li class="sidebar-item">
                        <a data-bs-target="#content-submenu" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            @lang('Manage Content')
                        </a>
                        <ul id="content-submenu" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a class="sidebar-link submenu-link"
                                    href="{{ route('admin.frontendBanner.create') }}">@lang('Manage Banner')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link submenu-link" href="#">@lang('Manage About')</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.product.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">@lang('Product')</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('admin.category.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">@lang('Category')</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.brand.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">@lang('Brand')</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
