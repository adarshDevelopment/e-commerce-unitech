<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $title = 'Home';
    protected $panel = 'Home Page';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = $this->title;
        $panel = $this->panel;
        return view('backend/homePage', compact('title','panel'));
    }



}
