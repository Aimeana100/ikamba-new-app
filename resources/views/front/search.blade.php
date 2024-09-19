<x-guest-layout>
    <!-- advertisement -->
    <div class="bg-gray-50 py-4 hidden">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="mx-auto table text-center text-sm">
                <a class="uppercase" href="#">Advertisement</a>
                <a href="#">
                    <img src="src/img/ads/ads_728.jpg" alt="advertisement area">
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
                        {{--                        <h2 class="text-gray-800 text-2xl font-bold">--}}
                        {{--                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> {{ $category->name }}--}}
                        {{--                        </h2>--}}
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3">
                            <div class="w-full py-3 mb-4">
                                <h2 class="text-gray-800 text-3xl font-bold">
                                    <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> Search result
                                    for:<b>{{$pattern}}</b>
                                </h2>
                            </div>
                        </div>
                        <div class="flex-shrink max-w-full w-full px-3 pb-5">
                            {{--                            <div class="relative hover-img max-h-98 overflow-hidden">--}}
                            {{--                                <!--thumbnail-->--}}
                            {{--                                <a href="#">--}}
                            {{--                                    <img class="max-w-full w-full mx-auto h-auto"--}}
                            {{--                                         src="{{ asset('uploads/images/' . $mostViewed->image) }}"--}}
                            {{--                                         alt="Image description">--}}
                            {{--                                </a>--}}
                            {{--                                <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">--}}
                            {{--                                    <!--title-->--}}
                            {{--                                    <a href="#">--}}
                            {{--                                        <h2 class="text-3xl font-bold capitalize text-white mb-3"> {{$mostViewed->title}}</h2>--}}
                            {{--                                    </a>--}}
                            {{--                                    <p class="text-gray-100 hidden sm:inline-block">{{$mostViewed->headlines}}</p>--}}
                            {{--                                    <!-- author and date -->--}}
                            {{--                                    <div class="pt-2">--}}
                            {{--                                        <div class="text-gray-100">--}}
                            {{--                                            <div--}}
                            {{--                                                class="inline-block h-3 border-l-2 border-green-600 mr-2"> {{Date('Y-m-d')}}</div>--}}
                            {{--                                            By {{ $mostViewed->author->name }}--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>

                        @foreach($articles as $article)
                            <x-article-card :article="$article"/>

                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="">
                                        <img class="max-w-full w-full mx-auto"
                                             src="{{@asset('uploads/images/'. $article->image)}}"
                                             alt="{{$article->title}}">
                                    </a>
                                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                            <a href="#"> {{$article->title}} </a>
                                        </h3>
                                        <p class="hidden md:block text-gray-600 leading-tight mb-1">
                                            {{$article->headlines}}
                                        </p>
                                        <a class="text-gray-500" href="#"><span
                                                class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{$article->category->name}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <x-most-popular-card :mostPopulars="$mostPopulars"/>
                    @php($ads = ['image' => @asset('front/src/img/ads/250.jpg')])
                    <x-ads-card :ads="$ads"/>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
