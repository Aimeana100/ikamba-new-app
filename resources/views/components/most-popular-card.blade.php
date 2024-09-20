@props(['mostPopulars'])

<div class="w-full bg-white">
    <div class="mb-6">
        <div class="p-4 bg-gray-100">
            <h2 class="text-lg font-bold">Most Popular</h2>
        </div>
        <ul class="post-number">
            @foreach($mostPopulars as $article)
                <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center"
                       href="{{route('front.single', ['slug' => $article->slug])}}"> {{$article->title}} </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
