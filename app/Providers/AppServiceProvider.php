<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Menu2;
use App\Models\ProductCategory;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Language;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param Request $request
     * @return void
     */
   public function boot(Request $request)
   {
        Schema::defaultStringLength(191);


        // Share All Language
        $languages = Language::where('status', 1)->get();
        View::share('languages', $languages);


        // Share Current Language
       $current_language = Language::where('code', $request->segment(1))->first()->code ?? config('app.locale');
       View::share('current_language', $current_language);


       // Get Settings
       $allSettings = [];
       $settings = Setting::all();
       if ($settings) {
           foreach ($settings as $setting) {
               $allSettings[$setting->key] = $setting;
           }
       }
       View::share('settings', $allSettings);

       // Get FooterCategories
       $footerCategories = ProductCategory::where(['parent_id' => 0, 'is_footer' => 1])->get();
       View::share('footerCategories', $footerCategories);

//       // Get top Menu items
//       $topMenus = Menu::where(['parent_id' => 0, 'status' => 1, 'type' => 1])
//           ->with('child')
//           ->orderBy('sort', 'ASC')
//           ->get();
//       View::share('topMenus', $topMenus);
//
//       // Get bottom Menu items
//       $bottomMenus = Menu::where(['parent_id' => 0, 'status' => 1, 'type' => 2])
//           ->with('child')
//           ->orderBy('sort', 'ASC')
//           ->get();
//       View::share('bottomMenus', $bottomMenus);
//
//       // Get bottom Menu items
//       $footerMenus = Menu::where(['parent_id' => 0, 'status' => 1, 'type' => 3])
//           ->orderBy('sort', 'ASC')
//           ->get();
//       View::share('footerMenus', $footerMenus);


        //$languages = Language::where('status', 1)->get();
        //- $current_language = Language::where('code', $request->segment(1))->first()->name;
        // $current_language = Language::where('code', 'az')->first()->name;
        //View::share('languages', $languages);
        // View::share('current_language', $current_language);
        // app()->setLocale($request->segment(1,'az'));
        // app()->setLocale('az');
    }
}
