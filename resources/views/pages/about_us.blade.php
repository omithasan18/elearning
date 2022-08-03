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
                <h4 class="text-4xl text-gray-600 font-bold mb-5 mt-2">Blockchain Education. Simplified.</h4>
                <h1 class="text-5xl text-gray-600 font-bold mb-5 mt-2">Chalq Learning</h1>
                <p class="text-xl leading-[1.5]">
                    Grounded in neuroscience and proven modern learning methodologies, Chalq is a Blockchain EdTech
                    startup creating an online Blockchain Education platform through our real-time crypto simulation
                    experience and bite-sized Microlearning video courses. At Chalq, our company mission is to become
                    the leading Blockchain Education platform by taking an educate first and invest second
                    approach through our Learn-to-Earn learning model.
                </p>
            </div>
            <div>
                <img src="{{asset('frontend/img/banner/1.png')}}" class="rounded-3xl max-w-[440px] md:ml-auto">
            </div>
        </div>
            
    </div>
</section>
@endsection

@push('js')

@endpush