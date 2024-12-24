@props(['article'])

<div>
    <form action="{{route('front.article.comment')}}" method="POST" novalidate="">
        @method('post')
        @csrf
        <div class="mt-2"></div>
        <div class="mb-6">
            <textarea
                class="w-full leading-5 relative py-3 px-5 text-gray-800 bg-white border border-gray-100 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600"
                placeholder="Comment" aria-label="insert comment" rows="4"
                name="comment"
                required=""></textarea>
        </div>
        <div class="mb-6">
            <input
                class="w-full leading-5 relative py-3 px-5 text-gray-800 bg-white border border-gray-100 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600"
                placeholder="Name" aria-label="name" name="name" type="text" required="">
        </div>
        <div class="mb-6">
            <input
                class="w-full leading-5 relative py-3 px-5 text-gray-800 bg-white border border-gray-100 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600"
                placeholder="Email" aria-label="email" name="email" type="text" required="">
        </div>
        <div class="mb-6">
            <div>
                <input
                    class="form-checkbox h-5 w-5 text-red-500 dark:bg-gray-700 border border-gray-100 dark:border-gray-700 focus:outline-none"
                    id="comment-cookies" name="comment-cookies" type="checkbox"
                    value="yes">
                <label class="ml-2 dark:text-gray-500 text-gray-600" for="comment-cookies ">
                    Save my name and email in this browser for the next
                    time I comment.
                </label>
            </div>
        </div>
        <input type="hidden" name="slug" value="{{$article->slug}}">
        <div class="mb-6">
            <button type="submit"
                    class="flex items-center py-3 px-5 leading-5 text-gray-100 bg-black hover:text-white hover:bg-gray-900 hover:ring-0 focus:outline-none focus:ring-0">
                Post Comment
            </button>
        </div>
    </form>
</div>
