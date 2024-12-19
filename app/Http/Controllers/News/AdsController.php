<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdsController extends Controller
{
    public function index(): View
    {
        $ads = Ads::all();
        return view('admin.ads.index', compact('ads'));
    }

    public function create(): View
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'title' => 'required',
            'position' => 'required', // either top or bottom
            'url' => 'required|url',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif|max:4096', 'dimensions:min_width=730,min_height=100,max_width=760,max_height=120'],
        ], [
            'image.dimensions' => 'The image dimensions must be between 730x100 and 800x120 pixels.',
        ]);


        $ads = new Ads;

        $ads->title = $request->title;
        $ads->position = $request->position;
        $ads->url = $request->url;
        $ads->status = $request->status;

        // save the image to the storage and get the path using Article custom method
        $article = new ArticleController();
        $article->extracted($request, $ads);

        $ads->save();

        return redirect()->back()->with('success', 'Ads created successfully!');
    }

    public function edit($id): View
    {
        $ads = Ads::find($id);
        return view('admin.ads.edit', compact('ads'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'position' => 'required', // either top or bottom
            'url' => 'required|url',
        ]);

        $ads = Ads::find($request->id);

        $ads->title = $request->title;
        $ads->position = $request->position;
        $ads->url = $request->url;
        $ads->status = $request->status;

        // save the image to the storage and get the path using Article custom method
        $article = new ArticleController();
        $article->extracted($request, $ads);

        $ads->save();

        return redirect()->route('admin.ads')->with('success', 'Ads updated successfully!');
    }

    public function delete($id): RedirectResponse
    {
        $ads = Ads::find($id);
        $ads->delete();
        return redirect()->back()->with('success', 'Ads deleted successfully!');
    }
}
