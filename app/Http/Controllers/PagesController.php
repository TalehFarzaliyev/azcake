<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    /**
     * @param Request $request
     * @param false $slug
     * @return Application|Factory|View
     */
    public function index(Request $request, $slug = false)
    {
        if ($slug == false) {
            abort('404');
        } else {
            $locale = $request->segment(1) ?? config('app.locale');

            $getSinglePage = Page::whereHas('translations', function ($q) use ($slug, $locale) {
                $q->where('locale', '=', $locale)->where('slug', '=', $slug);
            })->first();

            if ($getSinglePage) {
                return view('site.pages.static-pages', [
                    'page' => $getSinglePage
                ]);
            } else {
                abort('404');
            }
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function faq() {

        $faqs = Faq::where(['status' => 1])->orderBy('sort', 'DESC')->get();

        return view('site.pages.faq', [
            'faqs' => $faqs
        ]);
    }
}
