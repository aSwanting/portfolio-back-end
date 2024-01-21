<header>
    <nav class="navbar navbar-expand shadow">
        <div class="container">
            <div class="collapse navbar-collapse justify-content-between gap-3">

                <ul class="navbar-nav border rounded">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                </ul>

                @guest
                    <ul class="navbar-nav border rounded">
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    </ul>
                @else
                    Welcome back, {{ Auth::user()->name }}!
                    <ul class="navbar-nav border rounded">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.items.index') }}">Items</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('profile') }}">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
</header>
