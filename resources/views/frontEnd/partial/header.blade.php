@php
    $website = App\Models\SiteSetting::latest()->first();
@endphp
<nav class="navbar py-3">
    <div class="container mx-auto relative">
        <div class="flex justify-between items-center">
            <div>
                <a href="{{route('frontend.index')}}">
                    <img src="{{asset($website->logo ?? '')}}" alt="{{$website->name ?? ''}}" class="navbar__logo max-h-[40px]">
                </a>
            </div>
            <ul class="navbar__list hidden md:flex">
                <li class="navbar__item"><a href="{{route('course')}}" class="navbar__link">Courses</a></li>
                <li class="navbar__item"><a href="#" class="navbar__link">Pricing</a></li>
                <li class="navbar__item"><a href="#" class="navbar__link">Simulator</a></li>
                <li class="navbar__item"><a href="{{route('about-us')}}" class="navbar__link">About Us</a></li>
                <li class="navbar__item"><button class="button search-box-toggler"><i class="far fa-search"></i></button></li>
            </ul>
            <form class="search-box">
                <input type="text" class="search-box__input" placeholder="Search Here ...">
                <button type="button" class="search-box__close search-box-toggler"><i class="fal fa-times"></i></button>
            </form>
            <div class="flex space-x-2">
                <button class="button button--icon open-mobile-menu md:hidden"><i class="far fa-bars"></i></button>
                @auth
                    <a href="{{route('home')}}" class="button button--tertiary hidden xl:inline-block">Chalqboard</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button button--primary hidden md:inline-block">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a href="{{url('login')}}" class="button button--tertiary hidden xl:inline-block">Login</a>
                    <a href="{{url('register')}}" class="button button--primary hidden md:inline-block">Signup</a>
                @endauth
            </div>
        </div>
    </div>
</nav>