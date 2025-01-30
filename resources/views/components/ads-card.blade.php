{{--@props(['ads'])--}}
@if($middle_active_ads)
    <div class="text-sm py-6 sticky">
        <div class="w-full text-center">
            <a class="uppercase text-gray-800 dark:text-gray-300" href="#">Advertisement</a>
            <a target="_blank" href="{{ $middle_active_ads->link }}">
                <img class="mx-auto" src="{{ @asset('uploads/images/'. $middle_active_ads->image) }}"
                     alt="advertisement area">
            </a>
        </div>
    </div>
@endif
