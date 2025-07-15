<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return response()->json(Notification::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_id' => 'required|exists:documents,id',
            'type' => 'required|string',
            'message' => 'required|string',
            'recipient' => 'required|string',
        ]);

        $notif = Notification::create([
            'document_id' => $request->document_id,
            'type' => $request->type,
            'message' => $request->message,
            'recipient' => $request->recipient,
            'sent_at' => now(),
        ]);

        return response()->json($notif, 201);
    }
}
