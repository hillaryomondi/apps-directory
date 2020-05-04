<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('strathmore/admin-ui::admin.sidebar.content') }}</li>
{{--           <li class="nav-item"><a class="nav-link" href="{{ url('menu-items') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.menu-item.title') }}</a></li>--}}


                             {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon cui-puzzle"></i> Category
                </a>
                <ul class="nav-dropdown-items">
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon cui-puzzle"></i> Basic Data
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item"><a class="nav-link" href="{{ url('departments') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.department.title') }}</a></li>


                <li class="nav-item"><a class="nav-link" href="{{ url('bugs') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.bug.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('su-applications') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.su-application.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('screenshots') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.screenshot.title') }}</a></li>

                </ul>

            </li>

            <li class="nav-title">{{ trans('strathmore/admin-ui::admin.sidebar.settings') }}</li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
