<!DOCTYPE html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Site Title Here</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/user/dist/img/')}}/favi.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ALL CSS -->
    <!-- <link rel="stylesheet" href="dist/css/slick.css">
    <link rel="stylesheet" href="dist/css/slick-theme.css"> -->
    <link rel="stylesheet" href="{{asset('frontend/user/dist/css/')}}/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="{{asset('frontend/user/dist/css/')}}/tailwind.css">
</head>

<body>

    <!-- <div class="go-to-top"><i class="icofont-rounded-up"></i></div> -->
    <!-- go to top button -->
    <div class="preloader"><img src="{{asset('frontend/user/dist/img/')}}/loading.gif" alt=""></div>
    <!-- end of preloader -->

    <header class="bg-white py-2 mb-8">
        <div class="container flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{url('/')}}" class="from-emerald-500 via-emerald-600 to-emerald-500 px-5 py-2" style="width: 135px">
                    <img src="{{asset('frontend/user/dist/img/')}}/logo.png" alt="">
                </a>
                <a href="#" class="ml-5">Learn</a>
            </div>

            <div>
                <img src="{{asset('frontend/user/dist/img/')}}/profile-small.png" alt="" class="rounded-lg max-w-[50px]">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-600 font-bold mb-2 md:mb-4">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="bg-white rounded-xl p-5 md:p-10 pb-2">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-x-8 gap-y-3 mb-5">
                    <div class="relative md:col-span-2">
                        <img src="{{asset('frontend/user/dist/img/')}}/profile-large.png" alt="" class="rounded-lg md:max-w-[300px] w-full">
                        <span class="absolute bottom-1/4 -right-[10px] w-5 h-5 rounded-full bg-emerald-500 border-[4px] border-white"></span>
                    </div>
                    <div class="md:col-span-10">
                        <h2 class="text-2xl text-gray-600 font-bold mb-2">{{Auth::user()->name}}</h2>
                        <div class="text-gray-600 mb-4 md:mb-8">Level 2</div>
                        

                        <div class="flex gap-5 lg:items-center justify-between flex-col lg:flex-row">
                            <div class="grid grid-cols-2 gap-4 max-w-[330px]">
                                <div class="border rounded-lg p-4">
                                    <h5 class="text-2xl w-full flex items-center">150 <img src="{{asset('frontend/user/dist/img/')}}/icons/gold-coin.png" alt="" class="w-5 ml-2 inline-block"></h5>
                                    <div class="text-gray-500">Points Earned</div>
                                </div>
                                <div class="border rounded-lg p-4">
                                    <h5 class="text-2xl w-full flex items-center">75 <img src="{{asset('frontend/user/dist/img/')}}/icons/pie-chart-1.png" alt="" class="w-5 ml-2 inline-block"></h5>
                                    <div class="text-gray-500">Reward</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs flex gap-x-5 gap-y-2 flex-wrap list-none border-b-0 pl-0 mb-2" id="tabs-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-dashboard" class="nav-link border-b-4 pb-1 text-gray-500 border-transparent active" id="tabs-dashboard-tab" data-bs-toggle="pill" data-bs-target="#tabs-dashboard" role="tab" aria-controls="tabs-dashboard" aria-selected="true">Dashboard</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-overview" class="nav-link border-b-4 pb-1 text-gray-500 border-transparent" id="tabs-overview-tab" data-bs-toggle="pill" data-bs-target="#tabs-overview" role="tab" aria-controls="tabs-overview" aria-selected="false">Overview</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-change-info" class="nav-link border-b-4 pb-1 text-gray-500 border-transparent" id="tabs-change-info-tab" data-bs-toggle="pill" data-bs-target="#tabs-change-info" role="tab" aria-controls="tabs-change-info" aria-selected="false">Change Info</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-change-preference" class="nav-link border-b-4 pb-1 text-gray-500 border-transparent" id="tabs-change-preference-tab" data-bs-toggle="pill" data-bs-target="#tabs-change-preference" role="tab" aria-controls="tabs-change-preference" aria-selected="false">Notifications</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-8" id="tabs-tabContent">
                <div class="tab-pane fade show active" id="tabs-dashboard" role="tabpanel" aria-labelledby="tabs-dashboard-tab">
                    <div class="grid gap-8 grid-cols-1 md:grid-cols-2">


                        <div class="bg-white rounded-xl p-5 md:p-10">
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-2xl text-gray-600 font-bold">Your Badges</h3>
                                <a href="#" class="text-emerald-500">View All</a>
                            </div>
                            <div class="grid grid-cols-3 gap-10">
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/award.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/badge-1.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/badge.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/college.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/police-badge.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/award.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/badge-1.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/badge.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/college.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/police-badge.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/award.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/badge-1.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/badge.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/college.png" alt="" class="max-w-[60px] mx-auto"></div>
                                <div><img src="{{asset('frontend/user/dist/img/')}}/icons/badge/police-badge.png" alt="" class="max-w-[60px] mx-auto"></div>
                            </div>
                        </div>


                        <div class="bg-white rounded-xl p-5 md:p-10">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-2xl text-gray-600 font-bold">Completed Courses</h3>
                                    <div class="text-gray-400">Completed 10 Courses</div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table w-full tr-space-4 min-w-[500px]">
                                    <tr>
                                        <td class="w-[70px]"><img src="{{asset('frontend/user/dist/img/')}}/icons/handshake.png" alt="" class="max-w-[60px]"></td>
                                        <td>
                                            <h4 class="text-lg font-bold">Stacking</h4>
                                            <div class="text-gray-500">Amet Consectetur</div>
                                        </td>
                                        <td class="min-w-[100px]">
                                            <div class="progress-bar">
                                                <div class="progress-bar__text">
                                                    <div class="progress-bar__text--percentage">60%</div>
                                                    <div class="progress-bar__text--level"></div>
                                                </div>
                                                <div class="progress-bar__full-bar">
                                                    <div class="progress-bar__progress w-[60%]"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="text-emerald-500 bg-slate-100 py-2 px-3 rounded-md"><i class="fas fa-check-circle"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-[70px]"><img src="{{asset('frontend/user/dist/img/')}}/icons/fire.png" alt="" class="max-w-[60px]"></td>
                                        <td>
                                            <h4 class="text-lg font-bold">Stacking</h4>
                                            <div class="text-gray-500">Amet Consectetur</div>
                                        </td>
                                        <td class="min-w-[100px]">
                                            <div class="progress-bar">
                                                <div class="progress-bar__text">
                                                    <div class="progress-bar__text--percentage">60%</div>
                                                    <div class="progress-bar__text--level"></div>
                                                </div>
                                                <div class="progress-bar__full-bar">
                                                    <div class="progress-bar__progress w-[60%]"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="text-emerald-500 bg-slate-100 py-2 px-3 rounded-md"><i class="fas fa-check-circle"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-[70px]"><img src="{{asset('frontend/user/dist/img/')}}/icons/ethereum.png" alt="" class="max-w-[60px]"></td>
                                        <td>
                                            <h4 class="text-lg font-bold">Stacking</h4>
                                            <div class="text-gray-500">Amet Consectetur</div>
                                        </td>
                                        <td class="min-w-[100px]">
                                            <div class="progress-bar">
                                                <div class="progress-bar__text">
                                                    <div class="progress-bar__text--percentage">60%</div>
                                                    <div class="progress-bar__text--level"></div>
                                                </div>
                                                <div class="progress-bar__full-bar">
                                                    <div class="progress-bar__progress w-[60%]"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="text-emerald-500 bg-slate-100 py-2 px-3 rounded-md"><i class="fas fa-check-circle"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-[70px]"><img src="{{asset('frontend/user/dist/img/')}}/icons/nft.png" alt="" class="max-w-[60px]"></td>
                                        <td>
                                            <h4 class="text-lg font-bold">Stacking</h4>
                                            <div class="text-gray-500">Amet Consectetur</div>
                                        </td>
                                        <td class="min-w-[100px]">
                                            <div class="progress-bar">
                                                <div class="progress-bar__text">
                                                    <div class="progress-bar__text--percentage">60%</div>
                                                    <div class="progress-bar__text--level"></div>
                                                </div>
                                                <div class="progress-bar__full-bar">
                                                    <div class="progress-bar__progress w-[60%]"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="text-emerald-500 bg-slate-100 py-2 px-3 rounded-md"><i class="fas fa-check-circle"></i></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-5 md:p-10">
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-2xl text-gray-600 font-bold">Pending Assignment</h3>
                                <a href="#" class="text-emerald-500">View All</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table w-full tr-space-4 min-w-[250px]">
                                    <tr>
                                        <td class="w-[70px]"><img src="{{asset('frontend/user/dist/img/')}}/icons/handshake.png" alt="" class="max-w-[60px]"></td>
                                        <td>
                                            <h4 class="text-lg font-bold">Stacking</h4>
                                            <div class="text-gray-500">Amet Consectetur</div>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="text-emerald-500 bg-slate-100 py-2 px-3 rounded-md">Take Now</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-[70px]"><img src="{{asset('frontend/user/dist/img/')}}/icons/fire.png" alt="" class="max-w-[60px]"></td>
                                        <td>
                                            <h4 class="text-lg font-bold">Stacking</h4>
                                            <div class="text-gray-500">Amet Consectetur</div>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="text-emerald-500 bg-slate-100 py-2 px-3 rounded-md">Take Now</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-[70px]"><img src="{{asset('frontend/user/dist/img/')}}/icons/ethereum.png" alt="" class="max-w-[60px]"></td>
                                        <td>
                                            <h4 class="text-lg font-bold">Stacking</h4>
                                            <div class="text-gray-500">Amet Consectetur</div>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="text-emerald-500 bg-slate-100 py-2 px-3 rounded-md">Take Now</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-overview" role="tabpanel" aria-labelledby="tabs-overview-tab">
                    Tab 2 content
                </div>
                <div class="tab-pane fade" id="tabs-change-info" role="tabpanel" aria-labelledby="tabs-change-info-tab">
                    Tab 3 content
                </div>
                <div class="tab-pane fade" id="tabs-change-preference" role="tabpanel" aria-labelledby="tabs-change-preference-tab">
                    Tab 4 content
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white py-5 mt-8 text-center md:text-left">
        <div class="container flex gap-4 flex-col md:flex-row justify-between">
            <div class="text-gray-500">2022 @ Chaiq Inc</div>
            <div class="flex flex-col md:flex-row md:gap-6">
                <a href="#" class="text-gray-500">Privacy Policy</a>
                <a href="#" class="text-gray-500">Terms of Service</a>
            </div>
        </div>
    </footer>

    <div class="overlay"></div>


    <!-- ALL JS -->
    <script src="{{asset('frontend/user/dist/js/')}}/jquery-3.5.1.min.js"></script>
    <!-- <script src="dist/js/slick.min.js"></script> -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="dist/js/jquery.countdown.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{asset('frontend/user/dist/js/')}}/main.js"></script>
</body>

</html>