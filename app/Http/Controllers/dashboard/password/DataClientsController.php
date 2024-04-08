<?php

namespace App\Http\Controllers\dashboard\password;

use App\Http\Controllers\Controller;
use App\Models\DataCategory;
use App\Models\DataClient;

class DataClientsController extends Controller
{
    public function showCategoryClients($categoryId)
    {
        $category = DataCategory::findOrFail($categoryId);
        // Supposons que vous ayez une relation `clients` dans DataCategory pour récupérer les clients
        $clients = $category->clients;

        return view('dashboard.password.data-clients-controller', compact('category', 'clients', 'categoryId'));
    }
}
