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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[50px] md:gap-[100px] items-center">
            <div>
                <h4 class="text-xl text-blue-700 font-bold">Course</h4>
                <h1 class="text-5xl text-gray-600 font-bold mb-5 mt-2">Intro to Bitcoin</h1>
                <p class="text-xl leading-[1.5]">An introduction to Bitcoin, which covers what Bitcoin is and how it works, as well as exploring topics such as Bitcoin mining and Bitcoin halving.</p>

                <div class="flex gap-4 py-3">
                    <span class="text-green-700 font-bold">Beginner</span>
                    <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
                    <span>27 minutes</span>
                </div>
                
                <a href="#" class="button button--secondary mt-8">Start Course</a>
            </div>
            <div>
                <img src="{{asset('frontend/img/banner/1.png')}}" alt="" class="rounded-3xl max-w-[440px] md:ml-auto">
            </div>
        </div>
    </div>
</section>

<section class="section-padding-b">
    <div class="container">
        <h2 class="section-heading text-left ml-0 mb-5">Lessons</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
            <div class="border p-3 flex gap-5">
                <div>
                    <a href="{{ route('lesson.details') }}"><img src="{{asset('frontend/img/course/course-1.png')}}" alt="" class="max-w-[100px]"></a>
                </div>
                <div class="flex-grow">
                    <h4 class="leading-[1.3] line-clamp-2"><a href="{{ route('lesson.details') }}">Introduction to Bitcoin</a></h4>

                    <div class="flex gap-4 mt-1 text-sm">
                        <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
                        <span>27 minutes</span>
                    </div>
                </div>
            </div>
            <div class="border p-3 flex gap-5">
                <div>
                    <a href="{{ route('lesson.details') }}"><img src="{{asset('frontend/img/course/course-2.png')}}" alt="" class="max-w-[100px]"></a>
                </div>
                <div class="flex-grow">
                    <h4 class="leading-[1.3] line-clamp-2"><a href="{{ route('lesson.details') }}">How Does Bitcoin Mining Work?</a></h4>

                    <div class="flex gap-4 mt-1 text-sm">
                        <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
                        <span>27 minutes</span>
                    </div>
                </div>
            </div>
            <div class="border p-3 flex gap-5">
                <div>
                    <a href="{{ route('lesson.details') }}"><img src="{{asset('frontend/img/course/course-3.png')}}" alt="" class="max-w-[100px]"></a>
                </div>
                <div class="flex-grow">
                    <h4 class="leading-[1.3] line-clamp-2"><a href="{{ route('lesson.details') }}">What is a Bitcoin Halving?</a></h4>

                    <div class="flex gap-4 mt-1 text-sm">
                        <span><i class="fal fa-clock mr-1"></i> 3 lessons</span>
                        <span>27 minutes</span>
                    </div>
                </div>
            </div>
            <div class="border p-3 flex gap-5">
                <div>
                    <a href="{{ route('lesson.details') }}"><img src="{{asset('frontend/img/course/course-2.png')}}" alt="" class="max-w-[100px]"></a>
                </div>
                <div class="flex-grow">
                    <h4 class="leading-[1.3] line-clamp-2"><a href="{{ route('lesson.details') }}">Quiz</a></h4>

                    <div class="flex gap-4 mt-1 text-sm">
                        <span>27 minutes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')

@endpush