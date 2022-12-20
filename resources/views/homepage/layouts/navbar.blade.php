<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/beranda">TANYO <span>MURUNO</span></a>
        <ul class="nav justify-content-end">

            @auth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Syahsury</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-fill"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-clipboard-data"></i> Dashboard</a></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class=" dropdown-item"><i class="bi bi-box-arrow-left"></i>
                                    Logout</a></button>
                            </form>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
</nav>
