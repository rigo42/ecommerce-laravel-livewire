<nav class="main-nav">
    <ul class="menu">
        <li class="{{ active('client.home.index') }}">
            <a href="{{ route('client.home.index') }}">Inicio</a>
        </li>
        <li class="{{ active('client.about.index') }}">
            <a href="{{ route('client.about.index') }}">Nosotros</a>
        </li>
        <li class="{{ active('client.category.index') }}">
            <a href="{{ route('client.category.index') }}">Categorías</a>
        </li>
        <li class="{{ active('') }}">
            <a href="{{ route('client.home.index') }}">Productos</a>
        </li>
        <li class="{{ active('') }}">
            <a href="{{ route('client.home.index') }}">Contacto</a>
        </li>
    </ul><!-- End .menu -->
</nav><!-- End .main-nav -->