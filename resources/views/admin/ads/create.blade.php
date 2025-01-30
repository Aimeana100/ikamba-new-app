<x-app-layout>

    @section('ADS_SELECTED', 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700')
    @section('ADS_SELECTED_ICON', 'bg-gradient-to-tl from-purple-700 to-pink-500')

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
                           href="{{ route('admin.ads') }}">&nbsp;&nbsp;All
                            ADS </a>
                    </div>
                </div>
            </div>
            <div class="w-full  ">
                <div class="flex flex-wrap -mx-3 w-full ">
                    <div class="flex-auto p-6 px-0 pb-2 w-full  ">
                        <div
                            class="relative flex items-center p-0 ">
                            <div class="container z-10 ">
                                <div class="flex flex-wrap mt-0  ">
                                    <div
                                        class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 ">

                                        <div class="flex-auto p-6 ">

                                            <x-error-display :errors="$errors->any()"/>
                                            <x-success-message-display :successSession="session('success')"/>


                                            <form role="form"
                                                  action="{{route('admin.ads.store')}}"
                                                  method="post" enctype="multipart/form-data"
                                            >
                                                @method('post')
                                                @csrf()

                                                <label
                                                    class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">Title</label>
                                                <div class="mb-4">
                                                    <input type="text"
                                                           name="title"
                                                           required
                                                           class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                           placeholder="Title" aria-label="Title"
                                                           aria-describedby="email-addon"/>
                                                </div>


                                                <label
                                                    class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700"> Link
                                                    to </label>
                                                <div class="mb-4">
                                                    <input type="url"
                                                           name="url"
                                                           required
                                                           class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                           placeholder="Link" aria-label="URL"
                                                           aria-describedby="email-addon"/>
                                                </div>
                                                <label
                                                    class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">
                                                    Position </label>
                                                <div class="mb-4">
                                                    <select
                                                        name="position"
                                                        required
                                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        aria-describedby="email-addon">
                                                        <option> -- select --</option>
                                                        <option value="TOP">Top</option>
                                                        <option value="MIDDLE">Top</option>
                                                        <option value="BOTTOM">Bottom</option>

                                                    </select>
                                                </div>
                                                <label
                                                    class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">
                                                    Descriptive banner image </label>
                                                <div class="mb-4">
                                                    <input type="file"
                                                           name="image"
                                                           id="imageUpload"
                                                           required
                                                           class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                           aria-label="Image"/>
                                                    <!-- This is where the image will be displayed after upload -->
                                                    <div id="imageDisplayContainer" class="mt-4 max-w-md">
                                                        <img id="uploadedImage" src="" alt="Uploaded Image"
                                                             style="max-width: 100%; display: none;">
                                                    </div>

                                                </div>

                                                <label
                                                    class="mb-2 ml-1 font-bold text-sm/relaxed text-slate-700">
                                                    Status </label>
                                                <div class="mb-4">
                                                    <select
                                                        name="status"
                                                        title="want to show the ads right away or not"
                                                        required
                                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                        aria-describedby="email-addon">
                                                        <option> -- select --</option>
                                                        <option value="1">Ready</option>
                                                        <option value="0">Not Ready</option>

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

                                <script>
                                    // Get the file input and image display container
                                    const imageUpload = document.getElementById('imageUpload');
                                    const imageDisplayContainer = document.getElementById('imageDisplayContainer');
                                    const uploadedImage = document.getElementById('uploadedImage');

                                    // Set up event listener for file selection
                                    imageUpload.addEventListener('change', function (event) {
                                        const file = event.target.files[0]; // Get the first selected file
                                        // if (file) {
                                        //     const img = new Image();
                                        //     img.onload = function () {
                                        //         if (this.width < 100 || this.height < 100 || this.width > 2000 || this.height > 2000) {
                                        //             alert("Image dimensions must be between 100x100 and 2000x2000 pixels.");
                                        //             file.value = ""; // Clear the input
                                        //         }
                                        //     };

                                        // Create a URL for the uploaded image file
                                        const imageURL = URL.createObjectURL(file);

                                        // Set the src attribute of the image element to the uploaded image
                                        uploadedImage.src = imageURL;

                                        // Display the image container and the image
                                        uploadedImage.style.display = 'block';
                                    }
                                    else
                                    {
                                        // If no file is selected, hide the image
                                        uploadedImage.style.display = 'none';
                                    }
                                    })
                                    ;


                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
