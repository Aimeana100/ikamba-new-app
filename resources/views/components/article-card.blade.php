@props(['article'])
<div
    class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
    <div class="flex flex-row sm:block hover-img">
        <a href="{{route('front.single', ['slug' => $article->slug])}}">
            <img class="max-w-full w-full mx-auto"
                 src="{{@asset('uploads/images/'. $article->image)}}"
                 alt="{{$article->title}}">
        </a>
        <div class="py-0 sm:py-3 pl-3 sm:pl-0">
            <h3 class="text-lg font-bold leading-tight mb-2 dark:text-gray-300">
                <a href="{{route('front.single', ['slug' => $article->slug])}}"> {{$article->title}} </a>
            </h3>

            <div class="max-w-sm">
                <p
                    {{--                    style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;"--}}
                    class="hidden md:block dark:text-gray-300 text-gray-600 leading-tight mb-2 truncate-article">
                    {{ \Illuminate\Support\Str::limit($article->headlines, 150, '...') }}
                </p>
            </div>

            <a class="text-gray-500" href="{{route('front.single', ['slug' => $article->slug])}}"><span
                    class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{$article->category->name}}
            </a>

            &nbsp -- &nbsp

            <time class="mr-2 md:mr-4 dark:text-gray-400" datetime="2020-10-22 10:00">
                <!-- <i class="fas fa-calendar me-2"></i> -->
                <svg class="bi bi-calendar mr-2 inline-block" width="1rem" height="1rem"
                     viewBox="0 0 16 16" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"
                          clip-rule="evenodd"></path>
                    <path fill-rule="evenodd"
                          d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z"
                          clip-rule="evenodd"></path>
                </svg>
                {{\Carbon\Carbon::parse($article->published_at)->calendar()}}
            </time>
        </div>
    </div>

</div>
