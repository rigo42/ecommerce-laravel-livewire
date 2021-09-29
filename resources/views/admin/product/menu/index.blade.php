<div class="col-lg-2">
    <ul wire:ignore class="navi navi-link-rounded navi-accent navi-hover navi-active nav flex-column mb-8 mb-lg-0" role="tablist">

        <li class="navi-item mb-2">
            <a class="navi-link {{ active('admin.product.general.*') }}" href="{{ route('admin.product.general.edit', $product) }}">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fab fa-buffer text-dark mr-2"></i> General
                </span>
            </a>
        </li>

        <li class="navi-item mb-2">
            <a class="navi-link {{ active('admin.product.color.*') }}" href="{{ route('admin.product.color.index', $product) }}">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fas fa-palette text-dark mr-2"></i> Colores
                </span>
            </a>
        </li>

        <li class="navi-item mb-2">
            <a class="navi-link {{ active('admin.product.size.*') }}"  href="{{ route('admin.product.size.index', $product) }}">
                <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">
                    <i class="fab fa-medium text-dark mr-2"></i> Medidas
                </span>
            </a>
        </li>
    </ul>
</div>