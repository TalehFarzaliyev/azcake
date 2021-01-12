<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {

        $posts = Post::where(['status' => 1])->paginate(3);

        $lastPosts = Post::where(['status' => 1])->orderBy('id', 'DESC')->limit(3)->get();

        $categories = Category::with('posts')->where(['status' => 1, 'parent_id' => 0])->get();

        return view('site.pages.blog', [
            'posts'      => $posts,
            'lastPosts'  => $lastPosts,
            'categories' => $categories
        ]);
    }

    /**
     * @param Request $request
     * @param false $slug
     */
    public function details(Request $request, $slug = false) {
        if ($slug != false) {

            dd($slug);

        } else {
            abort('404');
        }
    }
}
