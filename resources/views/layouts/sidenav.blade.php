<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        @php
            $s = request()->url();
            $page = substr($s, strrpos($s, '/') + 1);
        @endphp
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if($page == 'dashboard'){{ "active" }}@endif" href="/../admin/dashboard">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($page == 'orders'){{ "active" }}@endif" href="/../admin/orders">
                    <span data-feather="file"></span>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($page == 'products'){{ "active" }}@endif" href="/../admin/products">
                    <span data-feather="shopping-cart"></span>
                    Producten
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($page == 'users'){{ "active" }}@endif" href="/../admin/users">
                    <span data-feather="users"></span>
                    Gebruikers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($page == 'categories'){{ "active" }}@endif" href="/../admin/categories">
                    <span data-feather="layers"></span>
                    Categorieën
                </a>
            </li>
        </ul>
    </div>
</nav>