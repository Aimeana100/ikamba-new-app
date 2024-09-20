<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ikamba news') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <!-- Development css -->
    <link rel="stylesheet" href="{{@asset('front/src/css/style.css')}}">

    <!-- Production css -->
    <link rel="stylesheet" href="dist/css/style.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{@asset('front/src/img/favicon.jpg')}}">

    {{--    fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
          integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        .social-btn-sp #social-links {
            margin: 0 auto;
            max-width: 500px;
        }

        .social-btn-sp #social-links ul li {
            display: inline-block;
        }

        .social-btn-sp #social-links ul li a {
            padding: 10px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 24px;
        }

        table #social-links {
            display: inline-table;
        }

        table #social-links ul li {
            display: inline;
        }

        table #social-links ul li a {
            padding: 5px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 10px;
            background: #e3e3ea;
        }
    </style>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-gray-700 pt-9 sm:pt-10">
<!-- ========== { HEADER }==========  -->
<header class="fixed top-0 left-0 right-0 z-50">
    <nav class="bg-black">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex justify-between">
                <div class="mx-w-10 text-2xl font-bold capitalize text-white flex items-center">Ikamba</div>

                <div class="flex flex-row">
                    <!-- nav menu -->
                    <ul class="navbar hidden lg:flex lg:flex-row text-gray-400 text-sm items-center font-bold">
                        <li class="active relative border-l border-gray-800 hover:bg-gray-900">
                            <a class="block py-3 px-6 border-b-2 border-transparent" href="{{route('front.index')}}">Home</a>
                        </li>

                        @foreach($categories as $category)

                            <li class="dropdown relative border-l border-gray-800 hover:bg-gray-900">
                                <a class="block py-3 px-6 border-b-2 border-transparent"
                                   href="#">{{$category->name}}</a>

                                <ul class="dropdown-menu font-normal absolute left-0 right-auto top-full z-50 border-b-0 text-left bg-white text-gray-700 border border-gray-100"
                                    style="min-width: 12rem;">
                                    <li class="relative hover:bg-gray-50">
                                        @foreach($category->children as $subCategory)
                                            <a class="block py-2 px-6 border-b border-gray-100"
                                               href="{{route('front.category.articles', $subCategory->slug)}}">
                                                {{$subCategory->name}}
                                            </a>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                    <!-- search form & mobile nav -->
                    <div class="flex flex-row items-center text-gray-300">
                        <div class="search-dropdown relative border-r lg:border-l border-gray-800 hover:bg-gray-900">
                            <button class="block py-3 px-6 border-b-2 border-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="open bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="close bi bi-x-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd"
                                          d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                            </button>
                            <div
                                class="dropdown-menu absolute left-auto right-0 top-full z-50 text-left bg-white text-gray-700 border border-gray-100 mt-1 p-3"
                                style="min-width: 15rem;">
                                <form action="{{route('front.search')}}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="flex flex-wrap items-stretch w-full relative">
                                        <input type="text"
                                               class="flex-shrink flex-grow flex-shrink max-w-full leading-5 w-px flex-1 relative py-2 px-5 text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600"
                                               name="pattern" placeholder="Search..." aria-label="search">
                                        <div class="flex -mr-px">
                                            <button
                                                class="flex items-center py-2 px-5 -ml-1 leading-5 text-gray-100 bg-black hover:text-white hover:bg-gray-900 hover:ring-0 focus:outline-none focus:ring-0"
                                                type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="relative hover:bg-gray-800 block lg:hidden">
                            <button type="button" class="menu-mobile block py-3 px-6 border-b-2 border-transparent">
                                <span class="sr-only">Mobile menu</span>
                                <svg class="inline-block h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                Menu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header><!-- end header -->

<!-- Mobile menu -->
<div class="side-area fixed w-full h-full inset-0 z-50">
    <!-- bg open -->
    <div class="back-menu fixed bg-gray-900 bg-opacity-70 w-full h-full inset-x-0 top-0">
        <div class="cursor-pointer text-white absolute right-64 p-2">
            <svg class="bi bi-x" width="2rem" height="2rem" viewBox="0 0 16 16" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z"
                      clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z"
                      clip-rule="evenodd"></path>
            </svg>
        </div>
    </div>

    <!-- Mobile navbar -->
    <nav id="mobile-nav"
         class="side-menu flex flex-col right-0 w-64 fixed top-0 bg-white dark:bg-gray-800 h-full overflow-auto z-40">
        <div class="mb-auto">
            <!--navigation-->
            <nav class="relative flex flex-wrap">
                <div class="text-center py-4 w-full font-bold border-b border-gray-100">Ikamba</div>
                <ul id="side-menu" class="w-full float-none flex flex-col">
                    <li class="relative">
                        <a href="{{route('front.index')}}"
                           class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Home</a>
                    </li>

                    <!-- dropdown with submenu-->
                    {{--                    <li class="dropdown relative">--}}
                    {{--                        <a class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="javascript:;">--}}
                    {{--                            News--}}
                    {{--                        </a>--}}

                    {{--                        <!-- dropdown menu -->--}}
                    {{--                        <ul class="dropdown-menu block rounded rounded-t-none top-full z-50 ml-4 py-0.5 text-left bg-white dark:bg-gray-800 mb-4"--}}
                    {{--                            style="min-width: 12rem">--}}
                    {{--                            <!--submenu-->--}}
                    {{--                            <li class="subdropdown relative">--}}
                    {{--                                <a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50"--}}
                    {{--                                   href="javascript:;">--}}
                    {{--                                    Dropdown item--}}
                    {{--                                </a>--}}

                    {{--                                <!--dropdown submenu-->--}}
                    {{--                                <ul class="dropdown-menu block rounded rounded-t-none top-full z-50 ml-4 py-0.5 text-left bg-white dark:bg-gray-800"--}}
                    {{--                                    style="min-width: 12rem">--}}
                    {{--                                    <li><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50"--}}
                    {{--                                           href="#">Dropdown sub item</a></li>--}}
                    {{--                                    <li><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50"--}}
                    {{--                                           href="#">Dropdown sub item</a></li>--}}
                    {{--                                    <li><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50"--}}
                    {{--                                           href="#">Dropdown sub item</a></li>--}}
                    {{--                                    <li><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50"--}}
                    {{--                                           href="#">Dropdown sub item</a></li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li><!--end submenu-->--}}
                    {{--                            <li class="relative"><a--}}
                    {{--                                    class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="#">Dropdown--}}
                    {{--                                    item</a></li>--}}
                    {{--                            <li class="relative"><a--}}
                    {{--                                    class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="#">Dropdown--}}
                    {{--                                    item</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    @foreach($categories as $category)
                        <li class="relative">
                            <a href="{{route('front.category.articles', $category->slug)}}"
                               class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <!-- copyright -->
        <div class="py-4 px-6 text-sm mt-6 text-center">
            <p>Copyright <a href="#">Ikamba</a> - All right reserved</p>
        </div>
    </nav>
</div><!-- End Mobile menu -->

<!-- =========={ MAIN }==========  -->
<main id="content">
    {{$slot}}

</main><!-- end main -->

<!-- =========={ FOOTER }==========  -->
<footer class="bg-black text-gray-400">
    <!--Footer content-->
    <div id="footer-content" class="relative pt-8 xl:pt-16 pb-6 xl:pb-12">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2 overflow-hidden">
            <div class="flex flex-wrap flex-row lg:justify-between -mx-3">
                <div class="flex-shrink max-w-full w-full lg:w-2/5 px-3 lg:pr-16">
                    <div class="flex items-center mb-2">
                        <span class="text-3xl leading-normal mb-2 font-bold text-gray-100 mt-2">Ikamba</span>
                        <!-- <img src="{{@asset('front/src/img-min/logo.png" alt="LOGO')}}"> -->
                    </div>
                    <p>This is Ikamba.com for build great newspapper, magazine and news portal.</p>
                    <ul class="space-x-3 mt-6 mb-6 Lg:mb-0">
                        <!--facebook-->
                        <li class="inline-block">
                            <a target="_blank" class="hover:text-gray-100" rel="noopener noreferrer"
                               href="https://facebook.com" title="Facebook">
                                <!-- <i class="fab fa-facebook fa-2x"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem"
                                     viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                          d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                                </svg>
                            </a>
                        </li>
                        <!--twitter-->
                        <li class="inline-block">
                            <a target="_blank" class="hover:text-gray-100" rel="noopener noreferrer"
                               href="https://twitter.com" title="Twitter">
                                <!-- <i class="fab fa-twitter fa-2x"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem"
                                     viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                          d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                                </svg>
                            </a>
                        </li>
                        <!--youtube-->
                        <li class="inline-block">
                            <a target="_blank" class="hover:text-gray-100" rel="noopener noreferrer"
                               href="https://youtube.com" title="Youtube">
                                <!-- <i class="fab fa-youtube fa-2x"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem"
                                     viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                          d="M508.64,148.79c0-45-33.1-81.2-74-81.2C379.24,65,322.74,64,265,64H247c-57.6,0-114.2,1-169.6,3.6-40.8,0-73.9,36.4-73.9,81.4C1,184.59-.06,220.19,0,255.79q-.15,53.4,3.4,106.9c0,45,33.1,81.5,73.9,81.5,58.2,2.7,117.9,3.9,178.6,3.8q91.2.3,178.6-3.8c40.9,0,74-36.5,74-81.5,2.4-35.7,3.5-71.3,3.4-107Q512.24,202.29,508.64,148.79ZM207,353.89V157.39l145,98.2Z"></path>
                                </svg>
                            </a>
                        </li>
                        <!--instagram-->
                        <li class="inline-block">
                            <a target="_blank" class="hover:text-gray-100" rel="noopener noreferrer"
                               href="https://instagram.com" title="Instagram">
                                <!-- <i class="fab fa-instagram fa-2x"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem"
                                     viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                          d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                                    <path fill="currentColor"
                                          d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                                    <path fill="currentColor"
                                          d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                                </svg>
                            </a>
                        </li><!--end instagram-->
                    </ul>
                </div>
                <div class="flex-shrink max-w-full w-full lg:w-3/5 px-3">
                    <div class="flex flex-wrap flex-row">
                        <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                            <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Product</h4>
                            <ul>
                                <li class="py-1 hover:text-white"><a href="#"> Latest news </a></li>
                                <li class="py-1 hover:text-white"><a href="#"> Trendings </a></li>
                                <li class="py-1 hover:text-white"><a href="#">All news categories</a></li>
                            </ul>
                        </div>
                        <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                            <h4 class="text-base leading-normal mb-3 uppercase text-gray-100"> Main Links </h4>
                            <ul>
                                <li class="py-1 hover:text-white"><a href="#">Login</a></li>
                                <li class="py-1 hover:text-white"><a href="#"> Reset Password </a></li>
                            </ul>
                        </div>
                        <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                            <h4 class="text-base leading-normal mb-3 uppercase text-gray-100"> Support</h4>
                            <ul>
                                <li class="py-1 hover:text-white"><a href="#"> 0788888888 </a></li>
                                <li class="py-1 hover:text-white"><a href="#"> info.ikamba.com </a></li>
                            </ul>
                        </div>
                        <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                            <h4 class="text-base leading-normal mb-3 uppercase text-gray-100"> Contact us</h4>
                            <ul>
                                <li class="py-1 hover:text-white"><a href="#"> Instagram </a></li>
                                <li class="py-1 hover:text-white"><a href="#">LinkedIn</a></li>
                                <li class="py-1 hover:text-white"><a href="#">Facebook</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Start footer copyright-->
    <div class="footer-dark">
        <div class="container py-4 border-t border-gray-200 border-opacity-10">
            <div class="row">
                <div class="col-12 col-md text-center">
                    <p class="d-block my-3">Copyright © Ikamba | All rights reserved.</p>
                </div>
            </div>
        </div>
    </div><!--End footer copyright-->
</footer><!-- end footer -->

<!-- =========={ SCROLL TO TOP }==========  -->
<a href="#"
   class="back-top fixed p-4 rounded bg-gray-100 border border-gray-100 text-gray-500 dark:bg-gray-900 dark:border-gray-800 right-4 bottom-4 hidden"
   aria-label="Scroll To Top">
    <svg width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
        <path fill-rule="evenodd"
              d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z"
              clip-rule="evenodd"></path>
    </svg>
</a>

<!--Vendor js-->
<script src="{{@asset('front/src/vendors/hc-sticky/dist/hc-sticky.js')}}"></script>
<script src="{{@asset('front/src/vendors/glightbox/dist/js/glightbox.min.js')}}"></script>
<script src="{{@asset('front/src/vendors/@splidejs/splide/dist/js/splide.min.js')}}"></script>
<script
    src="{{@asset('front/src/vendors/@splidejs/splide-extension-video/dist/js/splide-extension-video.min.js')}}"></script>

<!-- Start development js -->
<script src="{{@asset('front/src/js/theme.js')}}"></script>
<!-- End development js -->


<!-- Production js -->
<!-- <script src="dist/js/scripts.js"></script> -->
</body>

</html>
