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
    <div class="bg-white dark:bg-gray-800 py-6">
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
                                <h2 class="dark:text-gray-300 text-gray-800 text-3xl font-bold">
                                    <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> Search result
                                    for: <b>{{ $pattern }}</b>
                                </h2>
                            </div>
                        </div>

                        @foreach($articles as $article)
                            <x-article-card :article="$article"/>
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
