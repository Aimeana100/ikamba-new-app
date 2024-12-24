@props(['ads'])
<div class="text-sm py-6 sticky">
    <div class="w-full text-center">
        <a class="uppercase text-gray-800 dark:text-gray-300" href="#">Advertisement</a>
        <a href="#">
            <img class="mx-auto" src="{{$ads['image']}}"
                 alt="advertisement area">
        </a>
    </div>
</div>
