<nav class="navbar navbar-expand-lg navbarNo p-3 fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand furniluxe" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link home active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link home" href="Detail.html">Product</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link home" href="#">Category</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link home" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link home" href="#">Testimonial</a>
                </li>
            </ul>

            @guest
                <div class="button">
                    <li class="d-flex">
                        <a href="{{ route('register') }}"
                            class="btn btn-registerHome me-lg-2 px-4 py-2 ms-2 order-2 order-lg-1">Register</a>

                        <a href="{{ route('login') }}" class="btn btn-login px-4 py-2 order-1 gap-2 order-lg-2">Login</a>
                    </li>
                </div>
            @endguest

            @auth
                <div class="button">
                    <li class="d-flex">
                        <a href="{{ route('dashboard') }}"
                            class="btn btn-registerHome me-lg-2 px-4 py-2 ms-2 order-2 order-lg-1">Dashboard</a>
                    </li>
                </div>
            @endauth
        </div>
    </div>
</nav>
