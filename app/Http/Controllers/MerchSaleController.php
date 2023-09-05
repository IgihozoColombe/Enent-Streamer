<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MerchSale;

class MerchSaleController extends Controller
{
    public function index()
    {
        $merchSales = MerchSale::all();
        return response()->json($merchSales);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $merchSale = MerchSale::create($data);
        return response()->json($merchSale, 201);
    }

    // Implement show, update, and destroy methods similar to FollowerController
}
