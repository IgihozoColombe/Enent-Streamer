<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification; // Import the Notification model
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $message = $request->input('message');
        $userId = Auth::id();

        $notification = Notification::create([
            'user_id' => $userId,
            'message' => $message,
        ]);

        return response()->json($notification, 201);
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->update(['read' => true]);

        return response()->json(['message' => 'Notification marked as read'], 200);
    }

    public function markAsUnread($id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->update(['read' => false]);

        return response()->json(['message' => 'Notification marked as unread'], 200);
    }

    public function getUserNotifications()
    {
        $userId = Auth::id();
        $notifications = Notification::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return response()->json($notifications, 200);
    }
}
