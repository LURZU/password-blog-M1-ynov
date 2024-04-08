<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordDashboard extends Controller
{
    public function render() {
        return view('dashboard.password.passwordmanage');
    }


}
