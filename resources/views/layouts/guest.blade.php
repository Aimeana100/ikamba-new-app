<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
>
<head>

    {{--    Goodgle add sense--}}

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8342568204660890"
            crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description"
          content="@yield('meta_description', 'Stay updated with the latest news and blogs on IMBERE.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Rwanda, inkuru, news, blogs, updates, amakuru, imbere')">
    <meta name="author" content="Anathole">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'IMBERE')">
    <meta property="og:description" content="@yield('og_description', 'Ikintu cyambere ni amakuru | IMBERE')">
    <meta property="og:image" content="@yield('og_image', @asset('front/src/img/favicon.jpg'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="IMBERE">


    <meta name="twitter:card" content="@yield('og_image', @asset('front/src/img/favicon.jpg'))">
    <meta name="twitter:title" content="@yield('og_title', 'IMBERE')">
    <meta name="twitter:description" content="@yield('og_description', 'Ikintu cyambere ni amakuru | IMBERE')">
    <meta name="twitter:image" content="@yield('og_image', @asset('front/src/img/favicon.jpg'))">
    <meta name="twitter:site" content="@imberedotcom">
    <meta name="twitter:url" content="@yield('og_url', url()->current())">
    <meta name="twitter:creator" content="@yield('twitter_creator', '@imberedotcom')">


    <title>@yield('page_title', 'Ikintu cyambere ni amakuru | IMBERE')</title>


    <link rel="canonical" href="@yield('meta_canonical', url()->current())">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <!-- Development css -->
    {{--    <link rel="stylesheet" href="{{@asset('front/src/css/style.css')}}">--}}

    <!-- Production css -->
    <link rel="stylesheet" href="{{@asset('front/dist/css/style.css')}}">

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
<header class="fixed top-0 left-0 right-0 z-50 ">
    <nav class="border-gray-300 dark:border-gray-600 shadow-xl shadow-black	 border-b bg-gray-100 dark:bg-gray-700">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2 ">
            <div class="flex justify-between">
                <div class="mx-w-10 text-2xl font-bold capitalize text-white flex items-center">
                    <a href="{{route('front.index')}}">
                        <span class="text-3xl leading-normal mb-2 font-bold text-gray-900  dark:text-gray-100 mt-2">Imbere</span>
                    </a>
                </div>

                <button @click="darkMode = !darkMode" class="p-2 bg-gray-200 dark:bg-gray-700 rounded-full">
                    <span class="border p-1 rounded-full border-gray-600 " x-show="!darkMode">🌙</span>
                    <span x-show="darkMode">☀️</span>
                </button>

                <div class="flex flex-row">
                    <!-- nav menu -->
                    <ul class="navbar hidden lg:flex lg:flex-row text-gray-400 text-sm items-center font-bold">
                        <li class=" @yield('HOME_ACTIVE') relative border-l border-gray-800 hover:bg-gray-300 dark:hover:bg-gray-900">
                            <a class="block py-3 px-6 border-b-2 text-gray-900 dark:text-gray-400 border-transparent"
                               href="{{route('front.index')}}">Home</a>
                        </li>

                        @foreach($categories as $category)

                            <li class="dropdown relative border-l border-gray-800 hover:bg-gray-300 dark:hover:bg-gray-900">
                                <a class="block py-3 px-6 border-b-2 text-gray-900 dark:text-gray-400 border-transparent"
                                   href="#">{{$category->name}}</a>

                                <ul class="dropdown-menu font-normal absolute left-0 right-auto top-full z-50 border-b-0 text-left bg-white text-gray-700 border border-gray-100"
                                    style="min-width: 12rem;">
                                    <li class="relative  hover:bg-gray-300 dark:hover:bg-gray-300">
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
                    <div class="flex flex-row items-center hover:text-gray-300  text-gray-300">
                        <div
                            class="search-dropdown relative border-r lg:border-l border-gray-800 hover:text-gray-300  hover:bg-gray-900">
                            <button class="block py-3 px-6 border-b-2 border-transparent hover:text-gray-300 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="open bi bi-search hover:text-gray-300 text-gray-900 dark:text-gray-300"
                                     viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="close bi bi-x-lg hover:text-gray-300  text-gray-900 dark:text-gray-300"
                                     viewBox="0 0 16 16">
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
                                               class="flex-grow flex-shrink max-w-full leading-5 w-px flex-1 relative py-2 px-5 text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600"
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

                        <div class="relative hover:bg-gray-400 hover:rounded  dark:hover:bg-gray-800 block lg:hidden">
                            <button type="button"
                                    class="menu-mobile block py-3 px-6 border-b-2 border-transparent text-gray-900 dark:text-gray-300">
                                <span class="sr-only">Mobile menu</span>
                                <svg class="inline-block h-6 w-6 mr-2 text-gray-900 dark:text-gray-300"
                                     xmlns="http://www.w3.org/2000/svg" fill="none"
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
                <div class="text-center py-4 w-full font-bold border-b hover:bg-gray-300 dark:hover:bg-gray-900">
                    Imbere
                </div>
                <ul id="side-menu" class="w-full float-none flex flex-col">

                    <li class="relative">
                        <a href="{{route('front.index')}}"
                           class="block py-2 px-5 border-b border-gray-100 dark:border-gray-600 text-gray-900 dark:text-gray-400 hover:bg-gray-300 dark:hover:bg-gray-900">Home</a>
                    </li>

                    <!-- dropdown with submenu-->

                    @foreach($categories as $category)
                        <li class="dropdown relative">
                            <a class="block py-2 px-5 border-b  border-gray-100 dark:border-gray-600 text-gray-900 dark:text-gray-400 hover:bg-gray-50"
                               href="javascript:void(0)">
                                {{ $category->name }}
                            </a>


                            <!-- dropdown menu -->
                            <ul class="dropdown-menu block rounded rounded-t-none top-full z-50 ml-4 py-0.5 text-left bg-white dark:bg-gray-800 mb-4"
                                style="min-width: 12rem">
                                @foreach($category->children as $subCategory)

                                    <li class="relative"><a
                                            class="block w-full py-2 px-5 border-b  border-gray-100 dark:border-gray-600 text-gray-900 dark:text-gray-400  hover:bg-gray-50"
                                            href="{{route('front.category.articles', $subCategory->slug)}}"> {{ $subCategory->name }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach

                </ul>
            </nav>
        </div>
        <!-- copyright -->
        <div class="py-4 px-6 text-sm mt-6 text-center">
            <p>Copyright <a href="#">Imbere</a> - All right reserved</p>
        </div>
    </nav>
</div><!-- End Mobile menu -->

<!-- =========={ MAIN }==========  -->
<main id="content">
    {{--    exclude login route--}}
    @if(!request()->routeIs('login'))
        <x-top-ads-card :ad="$top_active_ads"/>
    @endif

    {{$slot}}
    @if(!request()->routeIs('login'))
        <x-top-ads-card :ad="$bottom_active_ads"/>
    @endif


</main><!-- end main -->

<!-- =========={ FOOTER }==========  -->
<footer class="shadow-md border-gray-700 border-t-2 bg-white text-gray-400 dark:bg-gray-700">
    <!--Footer content-->
    <div id="footer-content" class="relative pt-8 xl:pt-16 pb-6 xl:pb-12">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2 overflow-hidden">
            <div class="flex flex-wrap flex-row lg:justify-between -mx-3">
                <div class="flex-shrink max-w-full w-full lg:w-2/5 px-3 lg:pr-16">
                    <div class="flex items-center mb-2">
                        <a href="{{route('front.index')}}" class="text-2xl font-bold text-white">
                            <span class="text-3xl leading-normal mb-2 font-bold text-gray-900 dark:text-gray-100 mt-2">Imbere</span>
                        </a>

                        <!-- <img src="{{@asset('front/src/img-min/logo.png" alt="LOGO')}}"> -->
                    </div>
                    <p>Sura ikinyamakuru cya imbere.com ubone amakuru agezweho ku gihe, wadukurikira ku mbuga
                        nkonyambaga zose dukoresha. Ufite n’igitekerezo cg amakuru ushaka kutugezaho amarembo
                        arafunguye </p>
                    <ul class="space-x-3 mt-6 mb-6 Lg:mb-0">
                        <!--facebook-->
                        <li class="inline-block">
                            <a target="_blank" class=" hover:text-gray-700 dark:hover:text-gray-100"
                               rel="noopener noreferrer"
                               href="https://www.facebook.com/imberedotcom" title="Facebook">
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
                            <a target="_blank" class="hover:text-gray-700 dark:hover:text-gray-100"
                               rel="noopener noreferrer"
                               href="https://www.x.com/imberedotcom" title="Twitter">
                                <!-- <i class="fab fa-twitter fa-2x"></i> -->

                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M17.85 2H21L14.23 9.94L22 22h-6.77l-4.82-7.07L5.67 22H2.52L10.02 13.3L2 2h6.9l4.36 6.57L17.85 2ZM16.77 20h2.14L7.07 4H4.78L16.77 20Z"/>
                                </svg>

                            </a>
                        </li>
                        <!--youtube-->
                        <li class="inline-block">
                            <a target="_blank" class="hover:text-gray-700 dark:hover:text-gray-100"
                               rel="noopener noreferrer"
                               href="https://www.youtube.com/@imberedotcom" title="Youtube">
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
                            <a target="_blank" class="hover:text-gray-700 dark:hover:text-gray-100"
                               rel="noopener noreferrer"
                               href="https://www.instagram.com/imberedotcom" title="Instagram">
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


                        <!--Tiktok-->
                        <li class="inline-block">
                            <a target="_blank" class="hover:text-gray-700 dark:hover:text-gray-100"
                               rel="noopener noreferrer"
                               href="https://www.tiktok.com/@imberedotcom" title="TikTok">
                                <svg fill="currentColor" width="2rem" height="2rem" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg" xml:space="preserve"><path
                                        d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z"/></svg>
                            </a>
                        </li><!--end Tiktok-->


                    </ul>
                </div>
                <div class="flex-shrink max-w-full w-full lg:w-3/5 px-3">
                    <div class="flex flex-wrap flex-row">
                        <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                            <h4 class="text-base leading-normal mb-3 uppercase text-gray-900 dark:text-gray-100">IBYO
                                DUKORA</h4>
                            <ul>
                                {{--                                <li class="py-1 hover:text-black dark:hover:text-white"><a href="#"> Amakuru--}}
                                {{--                                        agezweho </a>--}}
                                {{--                                </li>--}}
                                {{--                                <li class="py-1 hover:text-black dark:hover:text-white"><a href="#"> kwamamaza </a></li>--}}
                                <li class="py-1 hover:text-black dark:hover:text-white"><a target="_blank"
                                                                                           href="https://www.youtube.com/@imberedotcom">Online
                                        TV Shows</a>
                                </li>
                            </ul>
                        </div>
                        <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                            <h4 class="text-base leading-normal mb-3 uppercase text-gray-900 dark:text-gray-100"> Main
                                Links </h4>
                            <ul>
                                {{--                                <li class="py-1 hover:text-black dark:hover:text-white"><a href="{{route('login')}}">Login</a></li>--}}

                                <li class="py-1 hover:text-black dark:hover:text-white"><a
                                        href="{{route('dashboard')}}">
                                        Dashboard </a></li>
                            </ul>
                        </div>
                        <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                            <h4 class="text-base leading-normal mb-3 uppercase text-gray-900 dark:text-gray-100">
                                UBUFASHA</h4>
                            <ul>
                                <li class="py-1 hover:text-black dark:hover:text-white"><a href="#"> +250733149386 </a>
                                </li>
                                <li class="py-1 hover:text-black dark:hover:text-white"><a
                                        href="mailto:imbereonlinenewspaper@gmail">
                                        Email us: IMBERE.COM </a></li>
                            </ul>
                        </div>
                        <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                            <h4 class="text-base leading-normal mb-3 uppercase text-gray-900 dark:text-gray-100">
                                DUKURIKIRE</h4>
                            <ul>
                                <li class="py-1 hover:text-black dark:hover:text-white"><a target="_blank"
                                                                                           href="https://www.instagram.com/imberedotcom">
                                        Instagram </a></li>
                                <li class="py-1 hover:text-black dark:hover:text-white"><a target="_blank"
                                                                                           href="https://www.youtube.com/@imberedotcom">YouTube</a>
                                </li>
                                <li class="py-1 hover:text-black dark:hover:text-white"><a target="_blank"
                                                                                           href="https://www.facebook.com/imberedotcom">Facebook</a>
                                </li>
                                <li class="py-1 hover:text-black dark:hover:text-white"><a target="_blank"
                                                                                           href="https://www.x.com/imberedotcom">X
                                        (Twitter) </a>
                                </li>
                                <li class="py-1 hover:text-black dark:hover:text-white"><a target="_blank"
                                                                                           href="https://www.tiktok.com/@imberedotcom">TikTok</a>
                                </li>

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
                    <p class="d-block my-3">Copyright © 2024 – {{Date('Y')}} @ Imbere | All rights reserved </p>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const maxLength = 150; // Define the maximum number of characters
        const articles = document.querySelectorAll('.truncate-article');

        articles.forEach(function (article) {
            let text = article.innerText; // Get the text content of each article
            if (text.length > maxLength) {
                text = text.slice(0, maxLength) + '...'; // Truncate the text if it's longer than the max length
                article.innerText = text; // Update the text content with the truncated version
            }
        });

    });


    window.addEventListener('load', function () {
        document.querySelectorAll('oembed[url]').forEach(element => {
            // get just the code for this youtube video from the url
            let vCode = element.attributes.url.value.split('?v=')[1];
            // paste some BS5 embed code in place of the Figure tag
            element.parentElement.outerHTML = `
    <div style="height: 100%"  class="">
        <iframe style="position: relative; width: auto; height: 100%; top: 0; left: 0;" height="auto" src="https://www.youtube.com/embed/${vCode}?rel=0"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>`;
        });
    })
</script>

<!--Vendor js-->
<script src="{{@asset('front/src/vendors/hc-sticky/dist/hc-sticky.js')}}"></script>
<script src="{{@asset('front/src/vendors/glightbox/dist/js/glightbox.min.js')}}"></script>
<script src="{{@asset('front/src/vendors/@splidejs/splide/dist/js/splide.min.js')}}"></script>
<script
    src="{{@asset('front/src/vendors/@splidejs/splide-extension-video/dist/js/splide-extension-video.min.js')}}"></script>

<!-- Start development js -->
{{--<script src="{{@asset('front/src/js/theme.js')}}"></script>--}}
<!-- End development js -->


<!-- Production js -->
<script src="{{@asset('front/dist/js/scripts.js')}}"></script>
</body>

</html>
