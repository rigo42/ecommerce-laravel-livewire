<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-section">
                <h4 class="menu-text">Dashboard</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            
            <li class="menu-item {{ active('dashboard.index') }}" >
                <a href="{{ route('admin.dashboard.index') }}" class="menu-link">
                    <i class="menu-icon text-dark fab fa-buffer"></i>
                    <span class="menu-text">General</span>
                </a>
            </li>

            @canany(['clientes'])
                
                <div class="my-5"></div>

                <li class="menu-section">
                    <h4 class="menu-text">CRM</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                @can('clientes')
                <li class="menu-item {{ active('client.*') }}" >
                    <a href="{{ route('admin.client.index') }}" class="menu-link">
                        <i class="menu-icon text-dark fa fa-users"></i>
                        <span class="menu-text">Clientes</span>
                    </a>
                </li>
                @endcan            
            @endcanany

            <div class="my-5"></div>
            <li class="menu-section">
                <h4 class="menu-text">Ajustes</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>

            @can('usuarios')
            <li class="menu-item {{ active('user.*') }}">
                <a href="{{ route('admin.user.index') }}" class="menu-link">
                    <i class="menu-icon text-dark fa fa-users"></i>
                    <span class="menu-text">Usuarios</span>
                </a>
            </li>
            @endcan

            @can('ajustes')
            <li class="menu-item {{ active('setting.*') }}">
                <a href="{{ route('admin.setting.welcome.index') }}" class="menu-link">
                    <i class="menu-icon text-dark fa fa-cog"></i>
                    <span class="menu-text">Configuraciones</span>
                </a>
            </li>
            @endcan

            @can('log')
            <li class="menu-item {{ active('log.*') }}">
                <a href="{{ route('admin.log.index') }}" class="menu-link">
                    <i class="menu-icon text-dark far fa-eye"></i>
                    <span class="menu-text">Logs</span>
                </a>
            </li>
            @endcan
            
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->