<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug) {
        return view('pages.show', ['slug' => $slug]);
    }
}
