<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SIMEC ERP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @foreach($menus as $menu)
                    <li class="nav-item">
                        <a href="{{route($menu->url)}}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                {{ $menu->title ?? '' }}
                                @if($menu->childs->count()>0)
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </p>
                        </a>
                        @if($menu->childs->count()>0)
                            @include('partials.manage_chaild_menu', ['childs' => $menu->childs])
                        @endif
                    </li>
                @endforeach
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
