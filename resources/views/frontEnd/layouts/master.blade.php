<!DOCTYPE html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Site Title Here</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="dist/img/favi.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ALL CSS -->
    @include('frontend.partial.head')
    @stack('css')
</head>

<body>

    <!-- <div class="go-to-top"><i class="icofont-rounded-up"></i></div> -->
    <!-- go to top button -->
    <div class="preloader"><img src="dist/img/loading.gif" alt=""></div>
    <!-- end of preloader -->

    <header>
        <nav class="navbar py-3">
            <div class="container mx-auto relative">
                <div class="flex justify-between items-center">
                    <div>
                        <a href="index.html"><img src="dist/img/logo.png" alt="" class="navbar__logo max-h-[40px]"></a>
                    </div>

                    <ul class="navbar__list hidden md:flex">
                        <li class="navbar__item"><a href="index.html" class="navbar__link">Categories</a></li>
                        <li class="navbar__item"><a href="blogs.html" class="navbar__link">Courses</a></li>
                        <li class="navbar__item"><a href="forum.html" class="navbar__link">Quizzes</a></li>
                        <li class="navbar__item"><a href="contact.html" class="navbar__link">Exchange</a></li>
                        <li class="navbar__item"><button class="button search-box-toggler"><i class="far fa-search"></i></button></li>
                    </ul>

                    <form class="search-box">
                        <input type="text" class="search-box__input" placeholder="Search Here ...">
                        <button type="button" class="search-box__close search-box-toggler"><i class="fal fa-times"></i></button>
                    </form>

                    <div class="flex space-x-2">
                        <button class="button button--icon open-mobile-menu md:hidden"><i class="far fa-bars"></i></button>
                        <a href="login.html" class="button button--tertiary hidden xl:inline-block">Login</a>
                        <a href="login.html" class="button button--primary hidden md:inline-block">Signup</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="section-padding">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-[50px] md:gap-[100px] items-center">
                    <div>
                        <h4 class="text-xl text-blue-700 font-bold">Welcome to</h4>
                        <h1 class="text-5xl text-gray-600 font-bold mb-5 mt-2">Chalq Learning</h1>
                        <p class="text-xl leading-[1.5]">Grounded in neuroscience and proven modern learning methodologies, Chalq is a Blockchain EdTech startup creating an online Blockchain Education platform through our real-time crypto simulation experience and bite-sized Microlearning
                            video courses. At Chalq, our company mission is to become the leading Blockchain Education platform by taking an educate first and invest second approach through our Learn-to-Earn learning model.
                        </p>
                        <a href="#" class="button button--secondary mt-8">Get Started</a>
                    </div>
                    <div>
                        <img src="dist/img/banner/1.png" class="rounded-3xl max-w-[440px] md:ml-auto">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding-b">
            <div class="container">
                <h2 class="section-heading">Blockchain and Cryptocurrency Education</h2>

                <div>
                    <iframe class="w-full max-w-[800px] mx-auto aspect-[3/1.8]" src="https://www.youtube.com/embed/CQ7XUCQ6pbE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer-section section-padding-t text-gray-500 border-t text-sm">
        <div class="container">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-6 md:gap-10">
                <div>
                    <img src="dist/img/logo.png" alt="" class="mb-5 max-w-[140px]">
                    <p>
                        Milton, Brisbane, <br> Queensland, 4064
                    </p>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-gray-700">Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="#">Altcoins</a></li>
                        <li><a href="#">Bitcoin</a></li>
                        <li><a href="#">Blockchain</a></li>
                        <li><a href="#">Cryptocurrency</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-gray-700">Helpful Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Quizzes</a></li>
                        <li><a href="#">Glossary</a></li>
                        <li><a href="#">Exchange</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-gray-700">Support</h3>



                    <ul class="space-y-2">
                        <li><a href="#">Help Centre</a></li>
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">Api Docs</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright border-t py-4 mt-5 text-center px-5">© 2022 Swyftx. All rights reserved.</div>
    </footer>

    <!-- start::mobile menu -->
    <div class="mobile-menu">
        <button type="button" class="mobile-menu__close button button--icon rounded-full text-white bg-red-600 hover:bg-red-400"><i
                class="far fa-times"></i></button>
        <ul class="mobile-menu__list">
            <li class="mobile-menu__item"><a href="#" class="mobile-menu__link">Home</a></li>
            <li class="mobile-menu__item"><a href="blog-details.html" class="mobile-menu__link">Blog</a></li>
            <li class="mobile-menu__item"><a href="forum.html" class="mobile-menu__link">Forum</a></li>
            <li class="mobile-menu__item"><a href="contact.html" class="mobile-menu__link">Contact</a></li>
        </ul>
    </div>
    <!-- end::mobile menu -->

    <div class="overlay"></div>

    @include('frontend.partial.foot')
    <!-- ALL JS -->
    @stack('js')
</body>

</html>