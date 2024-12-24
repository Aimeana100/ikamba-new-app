@props(['mostPopulars'])

<div class="w-full bg-gray-100 dark:bg-gray-700">
    <div class="mb-6">
        <div class="p-4 bg-gray-100 dark:bg-gray-700 border-b-2 border-gray-100 dark:border-gray-500">
            <h2 class="text-lg font-bold dark:text-gray-300 text-gray-600">Most Popular</h2>
        </div>
        <ul class="post-number">
            @foreach($mostPopulars as $article)
                <li class="border-b border-gray-100 dark:border-gray-800  hover:bg-gray-300">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center dark:hover:text-gray-700 dark:text-gray-400 text-gray-600"
                       href="{{route('front.single', ['slug' => $article->slug])}}"> {{$article->title}} </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
