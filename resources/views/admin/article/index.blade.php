<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <!-- content -->

        <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 lg:w-full lg:flex-none">
                <div class="flex flex-wrap -mx-3">
                    <div class="max-w-full px-3 mb-4 lg:mb-0 lg:w-full lg:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 mt-6 bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl">
                            <div
                                class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div class="flex flex-wrap -mx-3">
                                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                        {{--                                        <h6 class="mb-0">All Users</h6>--}}
                                        <div
                                            class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                <span
                    class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                  <i class="fas fa-search"></i>
                </span>
                                            <input type="text"
                                                   class="pl-9 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                   placeholder="Type here..."/>
                                        </div>
                                    </div>
                                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                        @if(Auth()->user()->role === 'admin')
                                            <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                                               href="{{route('admin.article.create')}}"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add
                                                New Article </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap -mx-3">
                                    <div class="flex-auto p-6 px-0 pb-2">
                                        <div class="overflow-x-auto">
                                            <table
                                                class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                                <thead class="align-bottom">
                                                <tr>

                                                    <th class="px-2 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-sm whitespace-nowrap border-b-gray-200 text-black opacity-100">
                                                        #
                                                    </th>
                                                    <th class="px-1 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-sm whitespace-nowrap border-b-gray-200 text-black opacity-70">
                                                        Title
                                                    </th>
                                                    <th class="px-2 py-3 pl-2 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-sm whitespace-nowrap border-b-gray-200 text-black opacity-70">
                                                        Desc. Image
                                                    </th>
                                                    <th class="px-2 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-sm whitespace-nowrap border-b-gray-200 text-black opacity-70">
                                                        Category
                                                    </th>
                                                    <th class="px-2 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-sm whitespace-nowrap border-b-gray-200 text-black opacity-70">
                                                        Published
                                                    </th>
                                                    {{--                                                    <th class="px-2 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-sm whitespace-nowrap border-b-gray-200 text-black opacity-70">--}}
                                                    {{--                                                        Archive status--}}
                                                    {{--                                                    </th>--}}
                                                    <th class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-sm whitespace-nowrap border-b-gray-200 text-black opacity-70">
                                                        Options
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($articles as $article )
                                                    <tr>
                                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                            <div class="flex px-2 py-1">
                                                                {{$article->id}}
                                                            </div>
                                                        </td>
                                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                            <div
                                                                class="mt-2 align-middle mx-w-lg  truncate max-w-xs overflow-hidden text-ellipsis">

                                                                {{ $article->title }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img width="80" height="60"
                                                                 src="{{ @asset('uploads/images/'.$article->image)}}"
                                                                 alt="{{$article->slug}}">
                                                        </td>
                                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                            <div class="mt-2 align-middle">
                                                                {{ $article->category->name }}
                                                            </div>
                                                        </td>
                                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                            <div class="mt-2 align-middle">
                                                                {{ $article->published_at ? 'Yes' : 'No' }}
                                                            </div>
                                                        </td>
                                                        {{--                                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">--}}
                                                        {{--                                                            <div class="mt-2 align-middle">--}}
                                                        {{--                                                                {{ $article->archive ? 'Archived' : 'Not archived' }}--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </td>--}}
                                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                            <div class="w-3/4 mx-auto">
                                                                <div class="ml-auto text-right">
                                                                    @if(Auth()->user()->role === 'admin')
                                                                        <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                                                                           href="javascript:;"><i
                                                                                class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a>
                                                                        <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                                                                           href="{{route('admin.article.edit', ['slug' => $article->slug])}}"><i
                                                                                class="mr-2 fas fa-pencil-alt text-slate-700"
                                                                                aria-hidden="true"></i>Edit</a>
                                                                    @endif
                                                                    <a class="inline-block px-2 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-sm ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                                                                       href="{{route('admin.article.review', ['slug' => $article->slug])}}"><i
                                                                            class="mr-2 fas fa-book text-slate-700"
                                                                            aria-hidden="true"></i>Review</a>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
