<x-app-layout>
    @section('CATEGORY_SELECTED', 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700')
    @section('CATEGORY_SELECTED_ICON', 'bg-gradient-to-tl from-purple-700 to-pink-500')

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
                           href="{{ route('admin.category') }}">&nbsp;&nbsp;All
                            Category</a>
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
                                        class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-10/12 ">

                                        <div class="flex-auto p-6">
                                            <x-error-display :errors="$errors->any()"/>
                                            <x-success-message-display :successSession="session('success')"/>


                                            <form role="form"
                                                  action="{{route('admin.category.store')}}"
                                                  method="post">
                                                @method('post')
                                                @csrf()
                                                <label
                                                    class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">name</label>
                                                <div class="mb-4">
                                                    <input type="text"
                                                           name="name"
                                                           required
                                                           class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                           placeholder="Name" aria-label="Name"
                                                           aria-describedby="email-addon"/>
                                                </div>

                                                <label
                                                    class="mb-0 ml-1 font-bold text-sm/relaxed text-slate-700"> Is
                                                    main </label>
                                                <div class="mb-4">
                                                    <span
                                                        class="text-xs text-gray-500"> Main category will show in user navigation menu, and only no-main category will show on article creation page. </span>
                                                    <select
                                                        name="is_main"
                                                        required
                                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        aria-describedby="email-addon">
                                                        <option value="" selected disabled> choose the level of
                                                            category
                                                        </option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                                <label
                                                    class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">Parent
                                                    Category</label>
                                                <div class="mb-4" id="parent_category_div">
                                                    <select
                                                        id="parent_category"
                                                        name="parent_category"
                                                        {{--                                                        required--}}
                                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        aria-describedby="email-addon">
                                                        <option value="" selected disabled>Select Parent Category
                                                        </option>
                                                        @foreach($mainCategory as $category)
                                                            <option
                                                                is_main={{$category->is_main ? 'isMain' : ''}}
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit"
                                                            class="inline-block lg:w-1/2 px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                                        Create
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
    {{--    toogle functions of is_main option and parent category --}}
    <script>
        const categorySelect = document.getElementById('parent_category');
        const isMain = document.querySelector('select[name="is_main"]');

        isMain.addEventListener('change', function () {
            categorySelect.disabled = isMain.value === '1';
        });
    </script>
</x-app-layout>
