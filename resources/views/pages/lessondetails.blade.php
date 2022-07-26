@extends('frontend.layouts.master')

@section('title')
{{ __('Course Details') }}
@endsection

@section('meta')

@endsection

@push('css')

@endpush

@section('content')

<section class="section-padding">
    <div class="container">
        <div class="flex gap-3">
            <a href="#" class="underline hover:text-blue-700">Home</a> / <a href="#" class="underline hover:text-blue-700">Courses</a> / <a href="#" class="underline hover:text-blue-700">Course Details</a>
        </div>
        <h1 class="text-5xl text-gray-600 font-bold mb-3 mt-2">Introduction to Bitcoin (BTC)</h1>
        <div class="flex gap-4">
            <span class="text-green-700 font-bold">Beginner</span>
            <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
            <span>27 minutes</span>
        </div>
        
        <a href="#" class="button button--secondary mt-8">Start Course</a>
    </div>
</section>

<section class="section-padding-b">
    <div class="container grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-8">
            <img src="{{asset('frontend/img/course/course-2.png')}}" alt="" class="w-full rounded-xl mb-7">
            <p>
                Bitcoin is just over ten years old but it has already had a huge impact on the world. Many believe that Bitcoin is the future of money. Others claim that Bitcoin is just “magic internet money” with no inherent value. Bitcoin has been proclaimed dead by economist critics and the media ever since its release, but despite this Bitcoin continues to thrive. But what actually is Bitcoin? This guide will explore what Bitcoin is, how it began, and how it works.
            </p>
            <h4 class="mt-5 mb-4 font-bold text-xl sm:text-3xl">What is Bitcoin? </h4>
            <p>
                Bitcoin is a peer-to-peer decentralized digital currency — the first of its kind in the world. This means that all Bitcoin transactions happen between equal, network participants without the need for a central authority like a central bank. This is made possible by using revolutionary blockchain technology, which was introduced by Bitcoin. <br>
                
                While Bitcoin was the first cryptocurrency, it is certainly not the only one. Its widespread popularity and success has paved the way for thousands of other cryptocurrencies, or ‘altcoins’.
            </p>
            <h4 class="mt-5 mb-4 font-bold text-xl sm:text-3xl">What can you use Bitcoin for?</h4>
            <p>
                Bitcoin has many of the same uses as fiat currencies. This means that you can use your Bitcoin as a medium of exchange to buy anything from coffee to cars, as long as the vendor accepts Bitcoin as payment. Another common use for Bitcoin is as a store of value. Many refer to Bitcoin as “digital gold”.
            </p>

            <h4 class="mt-10 mb-5 font-bold text-xl sm:text-3xl">Next lesson</h4>

            <div class="border p-3 sm:p-7 flex gap-5">
                <div>
                    <a href="#"><img src="{{asset('frontend/img/course/course-1.png')}}" alt="" class="max-w-[100px]"></a>
                </div>
                <div class="flex-grow">
                    <h4 class="leading-[1.3] line-clamp-3 text-sm sm:text-xl"><a href="#">How Does Bitcoin Mining Work?</a></h4>

                    <div class="hidden sm:flex gap-4 mt-1 text-sm">
                        <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
                        <span>27 minutes</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-4 space-y-4">
            <div class="bg-white shadow-lg">
                <a class="block text-gray-700 text-lg font-bold px-7 py-5 border-b"
                    data-bs-toggle="collapse" href="#course-outline" role="button" aria-expanded="false"
                    aria-controls="course-outline">
                    Course Outline
                </a>
                <div class="collapse show" id="course-outline">
                    <div class="space-y-5 p-7">
                        <div class="flex gap-3">
                            <div>
                                <a href="#"><img src="{{asset('frontend/img/course/course-3.png')}}" alt="" class="max-w-[60px]"></a>
                            </div>
                            <div class="flex-grow">
                                <h4 class="leading-[1.3] text-sm line-clamp-1"><a href="#">What is a Bitcoin Halving?</a></h4>
    
                                <div class="flex gap-4 mt-1 text-sm">
                                    <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
                                    <span>27 minutes</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div>
                                <a href="#"><img src="{{asset('frontend/img/course/course-2.png')}}" alt="" class="max-w-[60px]"></a>
                            </div>
                            <div class="flex-grow">
                                <h4 class="leading-[1.3] text-sm line-clamp-1"><a href="#">What is a Bitcoin Halving?</a></h4>
    
                                <div class="flex gap-4 mt-1 text-sm">
                                    <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
                                    <span>27 minutes</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div>
                                <a href="#"><img src="{{asset('frontend/img/course/course-1.png')}}" alt="" class="max-w-[60px]"></a>
                            </div>
                            <div class="flex-grow">
                                <h4 class="leading-[1.3] text-sm line-clamp-1"><a href="#">How Does Bitcoin Mining Work?</a></h4>
    
                                <div class="flex gap-4 mt-1 text-sm">
                                    <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
                                    <span>27 minutes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg">
                <a class="block text-gray-700 text-lg font-bold px-7 py-5 border-b"
                    data-bs-toggle="collapse" href="#contents" role="button" aria-expanded="false"
                    aria-controls="contents">
                    Contents
                </a>
                <div class="collapse show" id="contents">
                    <div class="space-y-3 p-7">
                        <a href="#" class="block hover:text-blue-700">What is Bitcoin?</a>
                        <a href="#" class="block hover:text-blue-700">What can you use Bitcoin for?</a>
                        <a href="#" class="block hover:text-blue-700">The benefits of Bitcoin</a>
                        <a href="#" class="block hover:text-blue-700">The history of Bitcoin</a>
                        <a href="#" class="block hover:text-blue-700">How does Bitcoin work?</a>
                        <a href="#" class="block hover:text-blue-700">How is Bitcoin created?</a>
                        <a href="#" class="block hover:text-blue-700">How many Bitcoins are there?</a>
                        <a href="#" class="block hover:text-blue-700">Is Bitcoin legal?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')

@endpush