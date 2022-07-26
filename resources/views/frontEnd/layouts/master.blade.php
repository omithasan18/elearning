<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
        @php
            $website = App\Models\SiteSetting::latest()->first();
        @endphp
        <link rel="shortcut icon" type="image/x-icon" href="{{asset($website->favicon ?? '')}}">
        <!-- meta keyword  -->
        @yield('meta')
        <!-- head  -->
        @include('frontend.partial.head')
        <!-- custom css  -->
        @stack('css')
    </head>
    <body>
        <header>
            @include('frontend.partial.header')
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="footer-section section-padding-t text-gray-500 border-t text-sm">
            @include('frontend.partial.footer')
        </footer>

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