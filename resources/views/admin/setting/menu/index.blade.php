<div class="col-xl-3">
    
    <ul class="navi navi-link-rounded navi-accent navi-hover navi-active nav flex-column mb-8 mb-lg-0" role="tablist">

        <li class="navi-item mb-2">
            <a class="navi-link {{ active('setting.welcome.index') }}" href="{{ route('admin.setting.welcome.index') }}">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fab fa-buffer text-dark mr-2"></i> Bienvenido
                </span>
            </a>
        </li>

        <li class="navi-item mb-2">
            <a class="navi-link {{ active('setting.role.*') }}" href="{{ route('admin.setting.role.index') }}">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fa fa-cog text-dark mr-2"></i> Roles
                </span>
            </a>
        </li>

        <li class="navi-item mb-2">
            <a class="navi-link {{ active('setting.permission.*') }}"  href="{{ route('admin.setting.permission.index') }}">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fa fa-cog text-dark mr-2"></i> Permisos
                </span>
            </a>
        </li>

        <li class="navi-item mb-2">
            <a class="navi-link" href="#">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fa fa-university text-dark mr-2"></i> Información de la empresa
                </span>
                <span class="menu-label">
                    <span class="label label-warning label-inline">Proximamente</span>
                </span>
            </a>
        </li>

        <li class="navi-item mb-2">
            <a class="navi-link" href="#">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fa fa-mail-bulk text-dark mr-2"></i> Configuración de correo
                </span>
                <span class="menu-label">
                    <span class="label label-warning label-inline">Proximamente</span>
                </span>
            </a>
        </li>

        <li class="navi-item mb-2">
            <a class="navi-link {{ active('setting.backup.*') }}" href="{{ route('admin.setting.backup.index') }}">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fa fa-database text-dark mr-2"></i> Copias de seguridad
                </span>
            </a>
        </li>
        
    </ul>
   
</div>