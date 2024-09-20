<?php

namespace App\Http\Controllers;

class SocialShareButtonsController extends Controller
{
    public function __invoke()
    {
        $shareComponent = \Share::page(
            'https://pranabkalita.com/posts/mastering-laravel-macros-a-comprehensive-guide',
            'Your share text comes here',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp();

        return view('post', compact('shareComponent'));
    }

}
