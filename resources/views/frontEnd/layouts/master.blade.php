<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
        @php
            $website = App\Models\SiteSetting::latest()->first();
        @endphp
        <link rel="shortcut icon" type="image/x-icon" href="{{asset($website->favicon)}}">
        <!-- meta keyword  -->
        @yield('meta')
        <!-- head  -->
        @include('frontend.partial.head')
        <!-- custom css  -->
        @stack('css')

    </head>
    <body>
        <div class="preloader">
            <img src="{{asset('frontend/dist/img/')}}/loading.gif" alt="">
        </div>
        <!-- end of preloader -->
        <header>
            @include('frontend.partial.header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="footer-section section-padding-t text-gray-500 border-t text-sm">
            @include('frontend.partial.footer')
        </footer>
        <!-- start::search popup -->
        <div class="search-popup">
            <button type="button" class="button button--icon search-popup__close"><i class="far fa-times"></i></button>
            <form action="search-result.html" method="get" class="search-popup__form">
                <div class="nice-form">
                    <select class="nice-form__input text-sm sm:text-base pr-0 px-2 rounded-r-none">
                        <option value="">Blog Posts</option>
                        <option value="">Forum Posts</option>
                        <option value="">Questions</option>
                    </select>
                    <span class="nice-form__prepend">Search In</span>
                </div>
                <div class="nice-form flex-grow">
                    <input type="text" class="nice-form__input text-sm sm:text-base search-popup__input pl-2 border-l-0 rounded-l-none" placeholder="Search Here">
                </div>
                <button type="submit" class="search-popup__button button button--icon border-transparent hidden md:block h-auto ml-3">
                    <i class="far fa-search"></i>
                </button>
            </form>
        </div>
        <!-- end::search popup -->
        <!-- start::mobile menu -->
        <div class="mobile-menu">
            <button type="button" class="mobile-menu__close button button--icon rounded-full text-white bg-red-600 hover:bg-red-400">
                <i class="far fa-times"></i>
            </button>
            <ul class="mobile-menu__list">
                <li class="mobile-menu__item"><a href="#" class="mobile-menu__link">Home</a></li>
                <li class="mobile-menu__item"><a href="blog-details.html" class="mobile-menu__link">Blog</a></li>
                <li class="mobile-menu__item"><a href="forum.html" class="mobile-menu__link">Forum</a></li>
                <li class="mobile-menu__item"><a href="contact.html" class="mobile-menu__link">Contact</a></li>
            </ul>
        </div>
        <!-- end::mobile menu -->
        <div class="overlay"></div>
        <!-- ALL JS -->
        @include('frontend.partial.foot')
        <!-- custom js  -->
        @stack('js')
    </body>
</html>