<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
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
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.service.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">@lang('Service')</span>
                </a>
            </li>

        </ul>

    </div>
</nav>
