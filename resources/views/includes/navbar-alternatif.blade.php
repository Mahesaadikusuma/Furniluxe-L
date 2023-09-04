 <section>
     <nav class="navbar navbar-expand-lg bg-body fixed-top text-body shadow p-4">
         <div class="container">
             <a class="navbar-brand" href="#">FurniLuxe</a>
             <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mx-auto mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="#">Home</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="#">Product</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="#">Collections</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="#">About</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="#">Contact</a>
                     </li>
                 </ul>
                 @guest
                     <div class="button d-flex gap-2">
                         <a href="{{ route('register') }}" class="btn-register px-4 py-2 order-2 order-lg-1">Register</a>
                         <a href="{{ route('login') }}" class="btn btn-login px-4 py-2 order-1 order-lg-2">Login</a>
                     </div>
                 @endguest


                 @auth
                     <div class="button d-flex gap-2">
                         <a href="{{ route('dashboard') }}" class="btn-register px-4 py-2 order-2 order-lg-1">Dashboard</a>

                     </div>
                 @endauth
             </div>
         </div>
     </nav>
 </section>
