<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if (Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-vehicles')}}">
                    <i class="bi bi-chat-left-dots"></i>
                    <span>Vehicles</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-licenses')}}">
                    <i class="bi bi-bank2"></i>
                    <span>Licenses</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin-payments')}}">
                    <i class="bi bi-credit-card"></i>
                    <span>Payments</span>
                </a>
            </li>
        @elseif (Auth::user()->hasRole('user'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('home')}}">
                    <i class="bi bi-grid"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-coin"></i>
                    <span>Application</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
            <a class="nav-link collapsed" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="bi bi-lock"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside>
