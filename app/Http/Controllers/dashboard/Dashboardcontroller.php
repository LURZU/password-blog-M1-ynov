<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function index() {
        return view('dashboard.index');
    }
}
