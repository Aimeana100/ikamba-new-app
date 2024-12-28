@props(['comments'])

<ol class="mb-4">
    @foreach($comments as $comment)
        <li class="py-2 mt-6">
            <div class="pb-4 border-b border-gray-200 dark:border-gray-600 border-dashed">
                <footer>
                    <img
                        class="w-20 h-20 border border-gray-200 dark:border-gray-700 max-w-full float-left mr-4"
                        src="{{@asset('front/src/img/avatar2.jpg')}}" alt="avatar">
                    <div>
                        <a class="text-lg leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100"
                           href="#" target="_blank"> {{$comment->name}} </a>
                        <span class="md:float-right text-sm">
                              <time
                                  class="text-gray-800 dark:text-gray-500"
                                  datetime="2020-10-27"> {{ \Carbon\Carbon::parse($comment->commented_at)->calendar() }}</time>
                            </span>
                    </div>
                </footer>
                <div>
                    <p class="text-gray-800 dark:text-gray-400">{{ $comment->comment }}  </p>
                </div>
            </div>
        </li>
    @endforeach
</ol>
