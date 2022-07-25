@php
    $website = App\Models\SiteSetting::latest()->first();
@endphp
<nav class="navbar py-3">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <a href="{{ route('frontend.index') }}">
                    <img src="{{asset($website->logo)}}" alt="{{$website->name }}" class="navbar__logo max-h-[40px]">
                </a>
            </div>
            <ul class="navbar__list ml-10 hidden md:flex">
                <li class="navbar__item"><a href="index.html" class="navbar__link">Categories</a></li>
                <li class="navbar__item"><a href="blogs.html" class="navbar__link">Courses</a></li>
                <li class="navbar__item"><a href="forum.html" class="navbar__link">Quizzes</a></li>
                <li class="navbar__item"><a href="contact.html" class="navbar__link">Exchange</a></li>
                <li class="navbar__item"><button class="button open-search-popup"><i class="far fa-search"></i></button></li>
            </ul>
            <div class="flex space-x-2">
                <button class="button button--icon open-mobile-menu md:hidden">
                    <i class="far fa-bars"></i>
                </button>
                @auth
                    <a href="#" class="button button--tertiary hidden md:inline-block">My Panel</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button button--primary hidden md:inline-block">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a href="{{url('login')}}" class="button button--tertiary hidden md:inline-block">Login</a>
                    <a href="login.html" class="button button--primary hidden md:inline-block">Signup</a>
                @endauth
            </div>
        </div>
    </div>
</nav>