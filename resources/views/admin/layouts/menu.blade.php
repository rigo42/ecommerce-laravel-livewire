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
            
            <li class="menu-item {{ active('admin.dashboard.index') }}" >
                <a href="{{ route('admin.dashboard.index') }}" class="menu-link">
                    <i class="menu-icon text-dark fab fa-buffer"></i>
                    <span class="menu-text">General</span>
                </a>
            </li>

            @canany(['banners'])
                
                <div class="my-5"></div>

                <li class="menu-section">
                    <h4 class="menu-text">Banners</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                @can('banners')
                    <li class="menu-item {{ active('admin.banner.*') }}" >
                        <a href="{{ route('admin.banner.index') }}" class="menu-link">
                            <i class="menu-icon text-dark fa fa-images"></i>
                            <span class="menu-text">Banners</span>
                        </a>
                    </li>
                @endcan            
            @endcanany

            @canany(['productos', 'categorias', 'marcas', 'medidas', 'colores'])
                
                <div class="my-5"></div>

                <li class="menu-section">
                    <h4 class="menu-text">SHOP</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                @can('productos')
                    <li class="menu-item {{ active('admin.product.*') }}" >
                        <a href="{{ route('admin.product.general.index') }}" class="menu-link">
                            <i class="menu-icon text-dark fas fa-store"></i>
                            <span class="menu-text">Productos</span>
                        </a>
                    </li>
                @endcan  

                @can('categorias')
                    <li class="menu-item {{ active('admin.category.*') }}" >
                        <a href="{{ route('admin.category.index') }}" class="menu-link">
                            <i class="menu-icon text-dark fa fa-tag"></i>
                            <span class="menu-text">Categor??as</span>
                        </a>
                    </li>
                @endcan            

                @can('marcas')
                    <li class="menu-item {{ active('admin.brand.*') }}" >
                        <a href="{{ route('admin.brand.index') }}" class="menu-link">
                            <i class="menu-icon text-dark fab fa-envira"></i>
                            <span class="menu-text">Marcas</span>
                        </a>
                    </li>
                @endcan  

                @can('generos')
                    <li class="menu-item {{ active('admin.gender.*') }}" >
                        <a href="{{ route('admin.gender.index') }}" class="menu-link">
                            <i class="menu-icon text-dark fas fa-venus-mars"></i>
                            <span class="menu-text">G??neros</span>
                        </a>
                    </li>
                @endcan  
            @endcanany

            <div class="my-5"></div>
            <li class="menu-section">
                <h4 class="menu-text">Blogs</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>

            @can('blogs')
                <li class="menu-item {{ active('admin.blog.*') }}">
                    <a href="{{ route('admin.blog.index') }}" class="menu-link">
                        <i class="menu-icon text-dark fa fa-book"></i>
                        <span class="menu-text">Blogs</span>
                    </a>
                </li>
                <li class="menu-item {{ active('admin.blog-category.*') }}">
                    <a href="{{ route('admin.blog-category.index') }}" class="menu-link">
                        <i class="menu-icon text-dark fa fa-bookmark"></i>
                        <span class="menu-text">Categor??as de blogs</span>
                    </a>
                </li>
                <li class="menu-item {{ active('admin.blog-tag.*') }}">
                    <a href="{{ route('admin.blog-tag.index') }}" class="menu-link">
                        <i class="menu-icon text-dark fa fa-tags"></i>
                        <span class="menu-text">Etiquetas de blogs</span>
                    </a>
                </li>
            @endcan

            <div class="my-5"></div>
            <li class="menu-section">
                <h4 class="menu-text">Ajustes</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>

            @can('usuarios')
            <li class="menu-item {{ active('admin.user.*') }}">
                <a href="{{ route('admin.user.index') }}" class="menu-link">
                    <i class="menu-icon text-dark fa fa-users"></i>
                    <span class="menu-text">Usuarios</span>
                </a>
            </li>
            @endcan

            @can('ajustes')
            <li class="menu-item {{ active('admin.setting.*') }}">
                <a href="{{ route('admin.setting.welcome.index') }}" class="menu-link">
                    <i class="menu-icon text-dark fa fa-cog"></i>
                    <span class="menu-text">Configuraciones</span>
                </a>
            </li>
            @endcan

            @can('log')
            <li class="menu-item {{ active('admin.log.*') }}">
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