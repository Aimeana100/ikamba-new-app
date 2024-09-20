@props(['ads'])
<div class="w-full bg-gray-50 h-full">
    <div class="text-sm py-6 sticky">
        <div class="w-full text-center">
            <a class="uppercase" href="#">Advertisement</a>
            <a href="#">
                <img class="mx-auto" src="{{$ads['image']}}"
                     alt="advertisement area">
            </a>
        </div>
    </div>
</div>