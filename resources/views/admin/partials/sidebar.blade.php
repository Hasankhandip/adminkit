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
                        <li class="sidebar-menu-list__item-two has-dropdown-two">
                            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                                <span class="icon">
                                    <i class="align-middle" data-feather="sliders"></i>
                                </span>
                                <span class="text"> @lang('Services') </span>
                            </a>
                            <div class="sidebar-submenu__two">
                                <ul class="sidebar-submenu-list ">

                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.service.index') }}">
                                            @lang('Service Content')
                                        </a>
                                    </li>
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.service.item.index') }}">
                                            @lang('Service Item')
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-menu-list__item-two has-dropdown-two">
                            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                                <span class="icon">
                                    <i class="align-middle" data-feather="sliders"></i>
                                </span>
                                <span class="text"> @lang('Work') </span>
                            </a>
                            <div class="sidebar-submenu__two">
                                <ul class="sidebar-submenu-list ">

                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.work.index') }}">
                                            @lang('Work Content')
                                        </a>
                                    </li>
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.work.item.index') }}">
                                            @lang('Work Item')
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.frontend.product.index') }}">
                                @lang('Product Content')
                            </a>
                        </li>

                        <li class="sidebar-menu-list__item-two has-dropdown-two">
                            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                                <span class="icon">
                                    <i class="align-middle" data-feather="sliders"></i>
                                </span>
                                <span class="text"> @lang('Blog') </span>
                            </a>
                            <div class="sidebar-submenu__two">
                                <ul class="sidebar-submenu-list ">
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.blog.index') }}">
                                            @lang('Blog Content')
                                        </a>
                                    </li>
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.blog.item.index') }}">
                                            @lang('Blog Item')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>



                        <li class="sidebar-menu-list__item-two has-dropdown-two">
                            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                                <span class="icon">
                                    <i class="align-middle" data-feather="sliders"></i>
                                </span>
                                <span class="text"> @lang('Manage Faq') </span>
                            </a>
                            <div class="sidebar-submenu__two">
                                <ul class="sidebar-submenu-list ">
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link" href="{{ route('admin.faq.index') }}">
                                            @lang('Faq Content')
                                        </a>
                                    </li>
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.faq.item.index') }}">
                                            @lang('Faq Item')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-menu-list__item-two has-dropdown-two ">
                            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                                <span class="icon">
                                    <i class="align-middle" data-feather="sliders"></i>
                                </span>
                                <span class="text"> @lang('Manage Contact') </span>
                            </a>
                            <div class="sidebar-submenu__two">
                                <ul class="sidebar-submenu-list ">
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.contact.index') }}">
                                            @lang('Contact Content')
                                        </a>
                                    </li>
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.contact.item.index') }}">
                                            @lang('Contact Item')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="sidebar-menu-list__item-two">
                            <a href="{{ route('admin.frontend.register.index') }}" class="sidebar-menu-list__link">
                                <span class="icon"> <i class="align-middle" data-feather="sliders"></i> </span>
                                <span class="text"> @lang('Manage Register') </span>
                            </a>
                        </li>
                        <li class="sidebar-menu-list__item-two ">
                            <a href="{{ route('admin.frontend.login.index') }}" class="sidebar-menu-list__link">
                                <span class="icon"> <i class="align-middle" data-feather="sliders"></i> </span>
                                <span class="text"> @lang('Manage Login') </span>
                            </a>
                        </li>


                        <li class="sidebar-menu-list__item-two has-dropdown-two">
                            <a href="javascript:void(0)" class="sidebar-menu-list__link">
                                <span class="icon">
                                    <i class="align-middle" data-feather="sliders"></i>
                                </span>
                                <span class="text"> @lang('Footer') </span>
                            </a>
                            <div class="sidebar-submenu__two">
                                <ul class="sidebar-submenu-list ">
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.footer.index') }}">
                                            @lang('Footer Content')
                                        </a>
                                    </li>
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.footer.contact.index') }}">
                                            @lang('Footer Contact')
                                        </a>
                                    </li>
                                    <li class="sidebar-submenu-list__item ">
                                        <a class="sidebar-submenu-list__link"
                                            href="{{ route('admin.frontend.footer.social.index') }}">
                                            @lang('Footer Social Link')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="sidebar-menu-list__item has-dropdown ">
                <a href="javascript:void(0)" class="sidebar-menu-list__link">
                    <span class="icon">
                        <i class="align-middle" data-feather="sliders"></i>
                    </span>
                    <span class="text"> @lang('Manage Products') </span>
                </a>
                <div class="sidebar-submenu">
                    <ul class="sidebar-submenu-list ">
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.category.index') }}">
                                @lang('Product Category')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.brand.index') }}">
                                @lang('Product Brand')
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.product.index') }}">
                                @lang('Product Item')
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="sidebar-menu-list__item has-dropdown ">
                <a href="javascript:void(0)" class="sidebar-menu-list__link">
                    <span class="icon">
                        <i class="align-middle" data-feather="sliders"></i>
                    </span>
                    <span class="text"> @lang('Manage Setting') </span>
                </a>
                <div class="sidebar-submenu">
                    <ul class="sidebar-submenu-list ">
                        <li class="sidebar-submenu-list__item ">
                            <a class="sidebar-submenu-list__link" href="{{ route('admin.general.setting.index') }}">
                                @lang('General Setting')
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
    </div>
</nav>
