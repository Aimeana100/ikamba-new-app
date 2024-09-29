@props(['successSession'])
<div>
    @if($successSession)
        <div
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ $successSession }}</span>
        </div>
    @endif
</div>
