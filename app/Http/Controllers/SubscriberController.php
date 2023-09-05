<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return response()->json($subscribers);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'subscription_tier' => 'required|integer',
        ]);

        $subscriber = Subscriber::create($data);
        return response()->json($subscriber, 201);
    }

    // Implement show, update, and destroy methods similar to FollowerController
}
