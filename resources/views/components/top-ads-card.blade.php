<!-- advertisement -->
@props(['ad'])
@if($ad)
    <div class="bg-gray-50 py-4">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="mx-auto table text-center text-sm">
                <a class="uppercase" href="#">Advertisement</a>
                <a href="{{ $ad->link }}">
                    <img src="{{ @asset('uploads/images/'. $ad->image) }}" alt="advertisement area">
                </a>
            </div>
        </div>
    </div>

@endif
