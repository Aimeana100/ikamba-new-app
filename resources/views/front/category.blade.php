<x-guest-layout>
    <!-- advertisement -->
    <div class="bg-gray-50 py-4 hidden">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="mx-auto table text-center text-sm">
                <a class="uppercase" href="#">Advertisement</a>
                <a href="#">
                    <img src="{{@asset('front/src/img/ads/ads_728.jpg')}}" alt="advertisement area">
                </a>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3  overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> {{ $category->name }}
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3 pb-5">
                            <div class="relative hover-img max-h-98 overflow-hidden">
                                <!--thumbnail-->
                                <a href="{{route('front.single', ['slug' => $mostViewed->slug])}}">
                                    <img class="max-w-full w-full mx-auto h-auto"
                                         src="{{ asset('uploads/images/' . $mostViewed->image) }}"
                                         alt="Image description">
                                </a>
                                <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                                    <!--title-->
                                    <a href="{{route('front.single', ['slug' => $mostViewed->slug])}}">
                                        <h2 class="text-3xl font-bold capitalize text-white mb-3"> {{$mostViewed->title}}</h2>
                                    </a>
                                    <p class="text-gray-100 hidden sm:inline-block">{{$mostViewed->headlines}}</p>
                                    <!-- author and date -->
                                    <div class="pt-2">
                                        <div class="text-gray-100">
                                            <div
                                                class="inline-block h-3 border-l-2 border-green-600 mr-2"> {{Date('Y-m-d')}}</div>
                                            By {{ $mostViewed->author->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($category->articles as $latestStory)
                            {{--call article-card componet and pass the $latestStory props   --}}
                            <x-article-card :article="$latestStory"/>
                        @endforeach
                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <x-most-popular-card :mostPopulars="$mostPopulars"/>
                    <!-- advertisement -->
                    @php($ads = ['image' => @asset('front/src/img/ads/250.jpg')])
                    {{--                    <x-ads-card :ads="$ads"/>--}}

                    <div class="text-sm py-6 sticky">
                        <div class="w-full text-center">
                            <a class="uppercase" href="#">Advertisement</a>
                            <a href="#">
                                <img class="mx-auto" src="{{@asset('front/src/img/ads/250.jpg')}}"
                                     alt="advertisement area">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
