<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function index() {
        if(auth()->user()->hasRole('admin')) {
            return view('dashboard.index');
        } else {
            return redirect()->route('home');
        }
    }
}
