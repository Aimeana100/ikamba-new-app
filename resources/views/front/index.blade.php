<x-guest-layout>

    @section('HOME_ACTIVE', 'active')
    <!-- advertisement -->
    {{--    <div class="bg-gray-50 py-4">--}}
    {{--        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">--}}
    {{--            <div class="mx-auto table text-center text-sm">--}}
    {{--                <a class="uppercase" href="#">Advertisement</a>--}}
    {{--                <a href="#">--}}
    {{--                    <img src="{{@asset('front/src/img/ads/ads_728.jpg" alt="advertisement area')}}">--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <!-- hero big grid -->
    <div class="py-6 shadow bg-white dark:bg-gray-800">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <!-- big grid 1 -->
            <div class="flex flex-row flex-wrap">
                <!--Start left cover-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1">
                    @foreach($homeArticles as $article)
                        @if($loop->first)

                            <div class="relative hover-img max-h-98 overflow-hidden">
                                <a href="{{route('front.single', ['slug' => $article->slug])}}">
                                    <img class="max-w-full w-full mx-auto h-auto"
                                         src="{{@asset('uploads/images/'. $article->image)}}"
                                         alt="Image description">
                                </a>
                                <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                                    <a href="{{route('front.single', ['slug' => $article->slug])}}">
                                        <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold capitalize text-white mb-3 line-clamp-3">
                                            {{ $article->title }}
                                        </h2></a>
                                    <p class="text-gray-100 hidden sm:inline-block"> {{ $article->headlines }} </p>
                                    <div class="pt-2">
                                        <div class="text-gray-100">
                                            <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                            {{ $article->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @break($loop->first)

                    @endforeach
                </div>

                <!--Start box news-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2">
                    <div class="box-one flex flex-row flex-wrap">

                        @foreach($homeArticles as $article)
                            @if(!$loop->first)

                                <article class="flex-shrink max-w-full w-full sm:w-1/2">
                                    <div class="relative hover-img max-h-48 overflow-hidden">
                                        <a href="{{route('front.single', ['slug' => $article->slug])}}">
                                            <img class="max-w-full w-full mx-auto h-auto"
                                                 src="{{@asset( 'uploads/images/'. $article->image)}}"
                                                 alt="Image description">
                                        </a>
                                        <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                            <a href="{{route('front.single', ['slug' => $article->slug])}}">
                                                <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1"> {{ $article->title }} </h2>
                                            </a>
                                            <div class="pt-1">
                                                <div class="text-gray-100">
                                                    <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                                    {{ $article->category->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- block news -->
    <div class="shadow bg-gray-100 dark:bg-gray-800">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 dark:text-white text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> Inkuru zakunzwe
                            ziheruka
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach($latestStories as $latestStory)
                            {{--call article-card componet and pass the $latestStory props   --}}
                            <x-article-card :article="$latestStory"/>
                        @endforeach
                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    @php($ads = ['image' => @asset('front/src/img/ads/250.jpg')])
                    <x-ads-card :ads="$ads"/>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
