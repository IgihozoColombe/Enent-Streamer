<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return response()->json($donations);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string|max:255',
            'donation_message' => 'nullable|string|max:255',
        ]);

        $donation = Donation::create($data);
        return response()->json($donation, 201);
    }

    // Implement show, update, and destroy methods similar to FollowerController
}
