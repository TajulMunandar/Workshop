<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/beranda">TANYO <span>MURUNO</span></a>
        <ul class="nav justify-content-end">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">{{ auth()->user()->name }}</a>
                    <ul class="dropdown-menu">
                        @if (auth()->user()->role > 0)
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-clipboard-data"></i> Dashboard</a></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class=" dropdown-item"><i class="bi bi-box-arrow-left"></i>
                                    Logout</a></button>
                            </form>
                        </li>
                        @else
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class=" dropdown-item"><i class="bi bi-box-arrow-left"></i>
                                    Logout</a></button>
                            </form>
                        </li>
                        @endif
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
</nav>
