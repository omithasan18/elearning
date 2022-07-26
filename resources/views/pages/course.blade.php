@extends('frontend.layouts.master')

@section('title')
    {{ __('Course') }}
@endsection

@section('meta')

@endsection

@push('css')

@endpush

@section('content')

<section class="section-padding">
    <div class="container">
        <div class="text-center max-w-[500px] mx-auto">
            <h1 class="text-5xl text-gray-600 font-bold mb-5 mt-2">Featured Courses</h1>
            <p class="text-xl leading-[1.5]">If you’re new to cryptocurrency or just want to learn more, our Learn courses are perfect for gaining the necessary knowledge to take you further in your crypto journey.</p>
        </div>
    </div>
</section>

<section class="section-padding-b">
    <div class="container">
        <div class="grid gap-8 grid-cols-1 md:grid-cols-12 mb-10">
            <div class="md:col-span-8">
                <h3 class="text-xl mb-4">Categories</h3>
                <div class="flex gap-2 flex-wrap">
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap hover:bg-blue-500 hover:text-white hover:border-transparent">Altcoins</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap hover:bg-blue-500 hover:text-white hover:border-transparent">Bitcoin</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap hover:bg-blue-500 hover:text-white hover:border-transparent">Blockchain</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap hover:bg-blue-500 hover:text-white hover:border-transparent">Cryptocurrency</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap hover:bg-blue-500 hover:text-white hover:border-transparent">DefiEthereum</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap hover:bg-blue-500 hover:text-white hover:border-transparent">Metaverse and Gaming</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap hover:bg-blue-500 hover:text-white hover:border-transparent">NFTSecurity</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap hover:bg-blue-500 hover:text-white hover:border-transparent">Trading and Analysis</a>
                </div>
            </div>
            <div class="md:col-span-4">
                <h3 class="text-xl mb-4">Difficulty</h3>
                <div class="flex gap-2 flex-wrap">
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap border-green-500 hover:bg-green-500 hover:text-white hover:border-transparent">Beginner</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap border-yellow-500 hover:bg-yellow-500 hover:text-white hover:border-transparent">Intermediate</a>
                    <a href="#" class="button button--tertiary text-sm whitespace-nowrap border-red-500 hover:bg-red-500 hover:text-white hover:border-transparent">Advanced</a>
                </div>
            </div>
        </div>
        <div class="grid gap-7 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <a href="{{ route('course.details') }}" class="shadow-lg block rounded-lg overflow-hidden hover:shadow-xl">
                <img src="{{asset('frontend/img/course/course-1.png')}}" alt="" class="w-full">
                <div class="p-4 pt-0">
                    <h3 class="font-bold text-xl my-3">Intro to Cryptocurrency</h3>
                    <p class="line-clamp-4">An introduction to the world of cryptocurrency, covering topics like how crypto works, investing strategies, and mistakes to avoid.</p>
                    <div class="flex gap-5 text-sm text-gray-500 mt-3">
                        <span class="font-bold text-green-700">Beginner</span>
                        <span><i class="fas fa-clock"></i> 5 Lessons</span>
                        <span>46 minutes</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('course.details') }}" class="shadow-lg block rounded-lg overflow-hidden hover:shadow-xl">
                <img src="{{asset('frontend/img/course/course-2.png')}}" alt="" class="w-full">
                <div class="p-4 pt-0">
                    <h3 class="font-bold text-xl my-3">Intro to Bitcoin</h3>
                    <p class="line-clamp-4">An introduction to the world of cryptocurrency, covering topics like how crypto works, investing strategies, and mistakes to avoid.</p>
                    <div class="flex gap-5 text-sm text-gray-500 mt-3">
                        <span class="font-bold text-yellow-700">Intermediate</span>
                        <span><i class="fas fa-clock"></i> 5 Lessons</span>
                        <span>46 minutes</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('course.details') }}" class="shadow-lg block rounded-lg overflow-hidden hover:shadow-xl">
                <img src="{{asset('frontend/img/course/course-3.png')}}" alt="" class="w-full">
                <div class="p-4 pt-0">
                    <h3 class="font-bold text-xl my-3">Trading and Analysis</h3>
                    <p class="line-clamp-4">An introduction to the world of cryptocurrency, covering topics like how crypto works, investing strategies, and mistakes to avoid.</p>
                    <div class="flex gap-5 text-sm text-gray-500 mt-3">
                        <span class="font-bold text-red-700">Advance</span>
                        <span><i class="fas fa-clock"></i> 5 Lessons</span>
                        <span>46 minutes</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection

@push('js')

@endpush