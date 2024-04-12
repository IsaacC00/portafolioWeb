<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    // Convinar con Project Controller
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.categories.show');
    }
}
