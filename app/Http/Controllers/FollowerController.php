<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;

class FollowerController extends Controller
{
    public function index()
    {
        $followers = Follower::all();
        return response()->json($followers);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $follower = Follower::create($data);
        return response()->json($follower, 201);
    }

    public function show(Follower $follower)
    {
        return response()->json($follower);
    }

    public function update(Request $request, Follower $follower)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $follower->update($data);
        return response()->json($follower);
    }

    public function destroy(Follower $follower)
    {
        $follower->delete();
        return response()->json(null, 204);
    }
}
