<nav id="sidebar" class="sidebar js-sidebar dashboard">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">@lang('AdminKit')</span>
        </a>
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
                                @lang('Banner Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.about.index') }}">
                                @lang('About Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.service.index') }}">
                                @lang('Service Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link"
                                href="{{ route('admin.frontend.service.item.index') }}">
                                @lang('Service Item')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.work.index') }}">
                                @lang('Work Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.work.item.index') }}">
                                @lang('Work Item')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.pricing.index') }}">
                                @lang('Pricing Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link"
                                href="{{ route('admin.frontend.pricing.item.index') }}">
                                @lang('Pricing Item')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.reffer.index') }}">
                                @lang('Reffer Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.team.index') }}">
                                @lang('Team Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.team.item.index') }}">
                                @lang('Team Member')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.product.index') }}">
                                @lang('Product Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link"
                                href="{{ route('admin.frontend.product.item.index') }}">
                                @lang('Product Item')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link"
                                href="{{ route('admin.frontend.testimonial.index') }}">
                                @lang('Testimonial Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link"
                                href="{{ route('admin.frontend.testimonial.item.index') }}">
                                @lang('Testimonial Item')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.blog.index') }}">
                                @lang('Blog Content')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.blog.item.index') }}">
                                @lang('Blog Item')
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
