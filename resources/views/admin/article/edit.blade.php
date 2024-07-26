<x-app-layout>
    <div class="w-full px-6 mx-auto">
        <!-- content -->
        <div
            class="relative flex flex-col  lg:w-2/3  min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div
                class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                    </div>
                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                        <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                           href="{{ route('admin.article') }}">&nbsp;&nbsp;All
                            Articles </a>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-auto p-6 px-0 pb-2">
                        <div
                            class="relative flex items-center p-0">
                            <div class="container z-10">
                                <div class="flex flex-wrap mt-0 -mx-3">
                                    <div
                                        class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 ">
                                        <div
                                            class="">

                                            <div class="flex-auto p-6">
                                                <form role="form"
                                                      action="{{route('admin.article.update')}}"
                                                      method="post" enctype="multipart/form-data">
                                                    @method('patch')
                                                    @csrf()

                                                    <label
                                                        class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">Category</label>
                                                    <div class="mb-4">
                                                        <select
                                                            name="category_id"
                                                            required
                                                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                            aria-describedby="email-addon">
                                                            <option> -- select --</option>
                                                            @foreach($categories as $category)
                                                                <option
                                                                    {{ $category->id === $article->category_id ? 'selected' : '' }}
                                                                    value="{{$category->id}}">
                                                                    @php echo ucfirst($category->name) @endphp
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label
                                                        class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">Title</label>
                                                    <div class="mb-4">
                                                        <input type="text"
                                                               name="title"
                                                               value="{{$article->title}}"
                                                               required
                                                               class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                               placeholder="Title" aria-label="Title"
                                                               aria-describedby="email-addon"/>
                                                    </div>
                                                    <label
                                                        class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">
                                                        Descriptive Image </label>
                                                    <div class="mb-4">
                                                        <input type="file"
                                                               name="image"
                                                               class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                               placeholder="Image" aria-label="Image"/>
                                                        <img height="100" width="70"
                                                             src="{{ @asset('uploads/images/'.$article->image)}}"
                                                             alt="{{$article->slug}}">
                                                    </div>
                                                    <label
                                                        class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">HeadLines</label>
                                                    <div class="mb-4">
                                                        <textarea
                                                            name="headlines"

                                                            id="headlines"
                                                            maxlength="150"
                                                            rows="3"
                                                            required
                                                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                            placeholder="Headlines" aria-label="Headlines"
                                                            aria-describedby="email-addon"> {{$article->headlines}} </textarea>
                                                    </div>
                                                    <label
                                                        class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">Article
                                                        Description </label>
                                                    <div class="mb-4">
                                                        <textarea
                                                            name="description"
                                                            id="description"
                                                            rows="6"
                                                            required
                                                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                            placeholder="Description" aria-label="Description"
                                                            aria-describedby="email-addon"> {{$article->description}} </textarea>
                                                    </div>

                                                    <input type="hidden" name="id" value="{{$article->id}}">

                                                    <div class="text-center">
                                                        <button type="submit"
                                                                class="inline-block lg:w-1/2 px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
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
    </div>
</x-app-layout>
