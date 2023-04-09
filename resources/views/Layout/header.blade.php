<nav class="navbar">
    <a href="{{ URL::to('/') }}">
    <img src="data:image/png;base64,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"
        alt="Company Logo"></a>
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="nav no-search">

        <li class="nav-item"><a href="{{URL::to('/') }}">Home</a></li>
        <li class="nav-item"><a href="{{URL::to('/about') }}">About</a></li>
        <li class="nav-item"><a href="{{URL::to('/contact') }}">Contact</a></li>
        <li class="nav-item"><a href="{{URL::to('/help') }}" style="margin-left: 10px">Help</a></li>
        @if(!Session::has('user'))
        <li class="nav-item"><a href="{{URL::to('/login') }}">Login</a></li>
        <li class="nav-item"><a href="{{URL::to('/signup') }}">Signup</a></li>
        @else
        <li class="nav-item"><a href="{{URL::to('/logout') }}">Logout</a></li>
        @endIf

        {{-- <li class="nav-item"><a href="{{ url('/contact') }}">Contact Us</a></li> --}}
        {{-- <i class="fas fa-search" id="search-icon"></i>
        <input class="search-input" type="text" placeholder="Search.."> --}}
    </ul>
</nav>
