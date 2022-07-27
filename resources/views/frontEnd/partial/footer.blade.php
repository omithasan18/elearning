@php
    $website = App\Models\SiteSetting::latest()->first();
@endphp
<div class="container">
    <div class="grid grid-cols-2 md:grid-cols-5 gap-y-6 md:gap-10">
        <div>
            <img src="{{asset($website->logo ?? '')}}" alt="{{ $website->name ?? ''}}" class="mb-5 max-w-[140px]">
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
        <div class="col-span-2 md:col-span-1">
            <img src="{{asset('frontend/img/gurantee.jpeg')}}" alt="" class="max-w-[200px] w-full mx-auto">
        </div>
    </div>
</div>

<div class="copyright border-t py-4 mt-5 text-center px-5">© 2022 chalq. All rights reserved.</div>