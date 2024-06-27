<nav>
    <input type="checkbox" id="sidebar-active">
    <label for="sidebar-active" class="open-sidebar-button">
        <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </svg>
    </label>
    <label id="overlay" for="sidebar-active"></label>
    <div class="links-container">
        <label for="sidebar-active" class="close-sidebar-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                <path
                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>
        </label>

        <p class="home-link">Uung<span>Motor</span></p>
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="{{ route('product') }}" class="{{ request()->routeIs('product') ? 'active' : '' }}">Products</a>
        <a href="{{ route('cart') }}" class="{{ request()->routeIs('cart') ? 'active' : '' }}">Cart</a>
        <a href="{{ route('order') }}" class="{{ request()->routeIs('order') ? 'active' : '' }}">Order</a>
        <a href="{{ route('appointment') }}"
            class="{{ request()->routeIs('appointment') ? 'active' : '' }}">Appointment</a>
        @if (auth()->check() && auth()->user()->email == 'admin@gmail.com')
            <a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        @endif
        @if (!auth()->check())
            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
        @endif
        <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">
            <i class="bi bi-person-circle fw-bold fs-4"></i>
        </a>
    </div>
</nav>
