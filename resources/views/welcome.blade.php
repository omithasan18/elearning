@extends('frontend.layouts.master')

@section('title')
    {{ __('Home') }}
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
                    <h4 class="text-xl text-blue-700 font-bold">Welcome to</h4>
                    <h1 class="text-5xl text-gray-600 font-bold mb-5 mt-2">Chalq Learning</h1>
                    <p class="text-xl leading-[1.5]">Grounded in neuroscience and proven modern learning methodologies, Chalq is a Blockchain EdTech startup creating an online Blockchain Education platform through our real-time crypto simulation experience and bite-sized Microlearning
                        video courses. At Chalq, our company mission is to become the leading Blockchain Education platform by taking an educate first and invest second approach through our Learn-to-Earn learning model.
                    </p>
                    <a href="#" class="button button--secondary mt-8">Get Started</a>
                </div>
                <div>
                    <img src="{{asset('frontend/dist/img/')}}/1.png" alt="" class="rounded-3xl">
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
@endsection

@push('js')

@endpush