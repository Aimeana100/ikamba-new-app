@props(['errors'])
<div class="mb-2">
    @if ($errors)
        <div class=" text-red-400">
            <ul class="">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
