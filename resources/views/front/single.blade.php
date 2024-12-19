<x-guest-layout>


    @section('page_title', 'IMBERE | ' . $article->title)
    @section('meta_description', $article->headlines)
    @section('meta_image', asset('uploads/images/'. $article->image))
    @section('meta_image_alt', $article->caption)
    @section('meta_url', route('front.single', ['slug' => $article->slug]))

    @section('og_title', 'IMBERE | ' . $article->title)
    @section('og_description', $article->headlines)
    @section('og_image', asset('uploads/images/'. $article->image))
    @section('og_url', route('front.single', ['slug' => $article->slug]))


    {{--    <x-top-ads-card/>--}}


    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3  overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> {{ $article->title }}
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="max-w-full w-full px-4">
                            <!-- Post content -->
                            <div class="leading-relaxed pb-4">
                                <p class="mb-5">
                                    {{ $article->headlines }}
                                </p>


                                <figure class="text-center mb-6">
                                    <img class="max-w-full h-auto" src="{{@asset('uploads/images/'. $article->image)}}"
                                         alt="Image description">
                                    <figcaption> {{ $article->caption ?? "No caption"  }} </figcaption>
                                </figure>
                                <div class="mb-6">
                                    {!! $article->description !!}
                                </div>
                                <div
                                    class="relative flex flex-row items-center justify-between overflow-hidden bg-gray-100 dark:bg-gray-900 dark:bg-opacity-20 mt-12 mb-2 px-6 py-2">
                                    <x-article-summary-card :article="$article"/>
                                    {{--                                    <x-social-media-share :shareLinks="$shareLinks"/>--}}
                                    <div class="social-btn-sp">
                                        {!! $shareLinks !!}
                                    </div>
                                </div>
                            </div>

                            <!-- author -->
                            {{--                            <x-author-with-image-card/>--}}

                            <!-- Comments -->
                            <div id="comments" class="pt-16">
                                <!--title-->
                                <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                                    {{ count($article->comments) === 1 ? 'Comment' : 'Comments' }}
                                </h3>

                                <!--comment list-->
                                <x-comments-section :comments="$article->comments"/>

                                <!--comment form-->
                                <div id="comment-form" class="mt-12">
                                    <h4 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                                        LEAVE A REPLY </h4>
                                    <p class="mb-5">Your email address will not be published</p>
                                    <x-comment-form :article="$article"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right -->
                <div
                    class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <x-most-popular-card :mostPopulars="$mostPopulars"/>

                    @php
                        $ads = ['image' => @asset('front/src/img/ads/250.jpg')]
                    @endphp
                    <x-ads-card :ads="$ads"/>
                </div>
            </div>
        </div>
    </div>
    {{--    <x-top-ads-card/>--}}

</x-guest-layout>
