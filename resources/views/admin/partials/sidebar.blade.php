<nav id="sidebar" class="sidebar js-sidebar dashboard">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">@lang('AdminKit')</span>
        </a>

        {{-- <ul class="sidebar-nav">
          
        
            <li class="sidebar-item submenu">
                <a data-bs-target="#frontend-submenu" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">@lang('Manage Frontend')</span>
                </a>
                <ul id="frontend-submenu" class="sidebar-dropdown list-unstyled">

                    <!-- Manage Content Submenu -->
                    <li class="sidebar-item">
                        <ul id="content-submenu" class="sidebar-dropdown list-unstyled">
                            <li class="sidebar-item">
                                <a class="sidebar-link submenu-link"
                                    href="{{ route('admin.frontend.banner.index') }}">@lang('Manage Banner')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link submenu-link"
                                    href="{{ route('admin.frontend.about.index') }}">@lang('Manage About')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link submenu-link"
                                    href="{{ route('admin.frontend.service.index') }}">@lang('Manage Service')</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link submenu-link"
                                    href="{{ route('admin.frontend.service.item.index') }}">@lang('Manage Service Item')</a>
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
        </ul> --}}
        <ul class="sidebar-menu-list">
            <li class="sidebar-menu-list__item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-menu-list__link">
                    <span class="icon">
                        <i class="align-middle" data-feather="sliders"></i>
                    </span>
                    <span class="text"> @lang('Dashboard')</span>
                </a>
            </li>

            <li class="sidebar-menu-list__item has-dropdown ">
                <a href="javascript:void(0)" class="sidebar-menu-list__link">
                    <span class="icon">
                        <i class="align-middle" data-feather="sliders"></i>
                    </span>
                    <span class="text"> @lang('Manage Frontend') </span>
                </a>
                <div class="sidebar-submenu">
                    <ul class="sidebar-submenu-list ">
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.banner.index') }}">
                                @lang('Manage Banner')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.about.index') }}">
                                @lang('Manage About')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.service.index') }}">
                                @lang('Manage Service')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link"
                                href="{{ route('admin.frontend.service.item.index') }}">
                                @lang('Manage Service Item')
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-menu-list__item ">
                <a href="{{ route('admin.product.index') }}" class="sidebar-menu-list__link">
                    <span class="icon"> <i class="align-middle" data-feather="sliders"></i> </span>
                    <span class="text"> @lang('Products') </span>
                </a>
            </li>
            <li class="sidebar-menu-list__item ">
                <a href="{{ route('admin.category.index') }}" class="sidebar-menu-list__link">
                    <span class="icon"> <i class="align-middle" data-feather="sliders"></i> </span>
                    <span class="text"> @lang('Category') </span>
                </a>
            </li>
            <li class="sidebar-menu-list__item ">
                <a href="{{ route('admin.brand.index') }}" class="sidebar-menu-list__link">
                    <span class="icon"> <i class="align-middle" data-feather="sliders"></i> </span>
                    <span class="text"> @lang('Brand') </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
