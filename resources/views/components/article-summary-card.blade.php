@props(['article'])
<div class="my-4 text-sm">
    <!--author-->
    <span class="mr-2 md:mr-4">
        <!-- <i class="fas fa-user me-2"></i> -->
        <svg class="bi bi-person mr-2 inline-block" width="1rem" height="1rem"
             viewBox="0 0 16 16"
             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
                d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z"
                clip-rule="evenodd"></path>
        </svg> by <a class="font-semibold" href="#"> {{ $article->author->name }} </a>
    </span>
    <!--date-->
    <time class="mr-2 md:mr-4" datetime="2020-10-22 10:00">
        <!-- <i class="fas fa-calendar me-2"></i> -->
        <svg class="bi bi-calendar mr-2 inline-block" width="1rem" height="1rem"
             viewBox="0 0 16 16" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"
                  clip-rule="evenodd"></path>
            <path fill-rule="evenodd"
                  d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z"
                  clip-rule="evenodd"></path>
        </svg>
        {{\Carbon\Carbon::parse($article->created_at)->calendar()}}
    </time>
    <!--view-->
    <span class="mr-2 md:mr-4">
    <!-- <i class="fas fa-eye me-2"></i> -->
    <svg class="bi bi-eye mr-2 inline-block" width="1rem" height="1rem"
         viewBox="0 0 16 16"
         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd"
            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 001.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0014.828 8a13.133 13.133 0 00-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 001.172 8z"
            clip-rule="evenodd"></path>
      <path fill-rule="evenodd"
            d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z"
            clip-rule="evenodd"></path>
    </svg> {{$article->views}} view
  </span>
    <!--end view-->
</div>
