<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendBaseController extends Controller
{
    protected function __loadDataToView($viewPath){
        view()->composer($viewPath, function ($view){
            $categories = Category::all()->where('status', 1);
            $navCategories = Category::where('status',1)->orderby('rank','asc')->limit(5)->get();
            $settings = Setting::all()->first();
            $view->with('categories', $categories);
            $view->with('navCategories', $navCategories);
            $view->with('title', $this->title);
            $view->with('settings', $settings);
        });
        return $viewPath;
    }
}
