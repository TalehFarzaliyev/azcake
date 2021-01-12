<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\GalleryCategories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {

        $galleryCategories = GalleryCategories::where(['status' => 1])->get();

        $galleries = Gallery::with('product')->where(['status' => 1])->get() ?? [];

        return view('site.pages.gallery', [
            'galleryCategories' => $galleryCategories,
            'galleries' => $galleries
        ]);
    }
}
