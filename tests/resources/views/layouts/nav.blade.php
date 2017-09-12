<nav class="navbar navbar-expand-md navbar-light bg-faded p-0">
    <div class="container">

        @if (Auth::guest())
            <p class="navbar-brand m-0" href="#">Welkom gast,
                login of
                <a class="navbar-brand bloo" href="/aanmelden">nieuwe klant.</a> </p>


            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item active"> <a class="nav-link" href="/">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="/artikelen">Artikel</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="/sitemap">Sitemap</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="/winkelwagen">Winkelwagen({{Session::has('cart') ? Session::get('cart')->totalQty : ''}})</a></li>

                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                @else
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            <li class="nav-item active"> <a class="nav-link" href="/">Home</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/artikelen">Artikelen</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/sitemap">Sitemap</a> </li>
                            @if(Auth::user()->email == 'admin@bonsai.com' )
                                <li class="nav-item"> <a class="nav-link" href="/">product management</a> </li>
                            @endif
                            <li class="nav-item"> <a class="nav-link" href="/winkelwagen">Winkelwagen({{Session::has('cart') ? Session::get('cart')->totalQty : ''}})</a></li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
            </div>
</nav>