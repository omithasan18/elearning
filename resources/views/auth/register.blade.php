<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Site Title Here</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontEnd/dist/img/')}}/favi.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ALL CSS -->
    <link rel="stylesheet" href="{{asset('frontEnd/dist/css/')}}/slick.css">
    <link rel="stylesheet" href="{{asset('frontEnd/dist/css/')}}/slick-theme.css">
    <link rel="stylesheet" href="{{asset('frontEnd/dist/css/')}}/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="{{asset('frontEnd/dist/css/')}}/tailwind.css">
</head>

<body>

    <!-- <div class="go-to-top"><i class="icofont-rounded-up"></i></div> -->
    <!-- go to top button -->
    <div class="preloader"><img src="{{asset('frontEnd/dist/img/')}}/loading.gif" alt=""></div>
    <!-- end of preloader -->

    <header class="h-auto">
        <nav class="navbar shadow-none absolute z-[2] bg-transparent py-3">
            <div class="container mx-auto !max-w-[80%]">
                <div class="flex justify-between items-center">
                    <div>
                        <a href="{{url('/')}}"><img src="{{asset('frontEnd/dist/img/')}}/logo.png" alt="" class="navbar__logo max-h-[40px]"></a>
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{url('login')}}" class="button button--tertiary">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="flex items-center pt-[80px] pb-[30px] min-h-[100vh] relative after:content-[''] after:z-[-1] after:absolute after:top-0 after:left-0 after:h-full after:w-full md:after:w-1/2 after:bg-blue-500">
            <div class="grid gap-10 grid-cols-1 md:grid-cols-2 w-full">
                <div class="max-w-[500px] mx-auto text-gray-100 pr-3 text-center order-last md:order-first">
                    <h2 class="text-4xl text-gray-100 font-bold mb-4">Some of our top features</h2>
                    <p class="text-lg mb-2">Check out popular features our users love</p>


                    <div id="carouselExampleCaptions" class="carousel slide relative pb-10" data-bs-ride="carousel">
                        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner relative w-full overflow-hidden">
                            <div class="carousel-item active relative float-left w-full">
                                <div class="w-[calc(100%-120px)] mx-auto">
                                    <img src="{{asset('frontEnd/dist/img/')}}/bundles.webp" alt="" class="mx-auto w-full max-w-[450px] mb-3">
                                    <h4 class="text-2xl text-white font-bold mb-3">Instant AUD deposits</h4>
                                    <p class="line-clamp-3">Deposit and Withdraw AUD via PayID, OSKO Bank Transfers & POLi Deposit and Withdraw AUD via PayID, OSKO Bank Transfers & POLiDeposit and Withdraw AUD via PayID, OSKO Bank Transfers & POLi</p>
                                </div>
                            </div>
                            <div class="carousel-item relative float-left w-full">
                                <div class="w-[calc(100%-120px)] mx-auto">
                                    <img src="{{asset('frontEnd/dist/img/')}}/bundles.webp" alt="" class="mx-auto w-full max-w-[450px] mb-3">
                                    <h4 class="text-2xl text-white font-bold mb-3">Instant AUD deposits</h4>
                                    <p class="line-clamp-3">Deposit and Withdraw AUD via PayID, OSKO Bank Transfers & POLi</p>
                                </div>
                            </div>
                            <div class="carousel-item relative float-left w-full">
                                <div class="w-[calc(100%-120px)] mx-auto">
                                    <img src="{{asset('frontEnd/dist/img/')}}/bundles.webp" alt="" class="mx-auto w-full max-w-[450px] mb-3">
                                    <h4 class="text-2xl text-white font-bold mb-3">Instant AUD deposits</h4>
                                    <p class="line-clamp-3">Deposit and Withdraw AUD via PayID, OSKO Bank Transfers & POLi</p>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev absolute bottom-0 flex items-end justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                        <button class="carousel-control-next absolute bottom-0 flex items-end justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                </div>
                <div class="max-w-[500px] mx-auto order-first md:order-last relative md:static md:order-first p-10 md:p-0 bg-white md:bg-transparent rounded-lg md:rounded-0">
                    <div class="max-w-[300px] mx-auto text-gray-700">
                        <h2 class="text-4xl font-bold mb-6">Sign Up</h2>
                        <p class="bg-slate-100 text-sm p-2 mb-3">
                            Always check you are on the official site <br>
                        </p>
                        @if ($errors->any())
                                <div class="alert alert-danger" style="color: red">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form class="space-y-3" action="{{route('student-register')}}" method="post">
                            @csrf
                            <div class="nice-form">
                                <input type="text" name="name" value="{{old('name')}}" class="nice-form__input" placeholder="Name" required>
                                <span class="nice-form__prepend">Name</span>
                            </div>
                            <div class="nice-form">
                                <input type="text" name="username" value="{{old('username')}}" class="nice-form__input" placeholder="Username" required>
                                <span class="nice-form__prepend">User Name</span>
                            </div>
                            <div class="nice-form">
                                <input type="email" name="email" value="{{old('email')}}" class="nice-form__input" placeholder="Email" required>
                                <span class="nice-form__prepend">Email</span>
                            </div>
                            <div class="nice-form">
                                <input type="password" name="password" class="nice-form__input" placeholder="Passowrd" required>
                                <span class="nice-form__prepend">Passowrd</span>
                            </div>
                            <div class="nice-form">
                                <input type="password" name="password_confirmation" class="nice-form__input" placeholder="Passowrd" required>
                                <span class="nice-form__prepend">Confirm Passowrd</span>
                            </div>
                            <div>
                                <button type="submit" class="button button--secondary w-full">Create Account</button>
                            </div>
                            <div class="text-center text-[12px]">
                                by creating an account you agree to our <br>
                                <a href="#" class="underline">Terms of Use</a> & <a href="#" class="underline">Privacy Policy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="overlay"></div>


    <!-- ALL JS -->
    <script src="{{asset('frontEnd/dist/js/')}}/jquery-3.5.1.min.js"></script>
    <script src="{{asset('frontEnd/dist/js/')}}/slick.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('frontEnd/dist/js/')}}/jquery.countdown.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{asset('frontEnd/dist/js/')}}/main.js"></script>
</body>

</html>