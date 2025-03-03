<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendBaseController extends Controller
{
    protected function __loadDataToView($viewPath){
        view()->composer($viewPath, function ($view){
            $view->with('panel', $this->panel);
            $view->with('view_path', $this->view_path);
            $view->with('base_route', $this->base_route);
            $view->with('title', $this->title);
            if (isset($this->file_path)){
                $view->with('file_path',$this->file_path);
            }
        });
        return $viewPath;
    }
}
