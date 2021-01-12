<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $all = Setting::all();
        $setting = [];
        foreach($all as $one) {
            $setting[$one->key] = $one->value;
        }
        return view('admin.pages.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        foreach($input['setting'] as $key => $value) {
            Setting::updateOrCreate(
                ['key'=> $key],
                ['value' => $value]);
        }
        return redirect(route('admin.setting'));
    }
}
