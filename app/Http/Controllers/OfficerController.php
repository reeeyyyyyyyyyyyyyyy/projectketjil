<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        return response()->json(Officer::with('user')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department' => 'required|string',
            'position' => 'required|string',
            'phone_extension' => 'required|string',
        ]);

        $officer = Officer::create($request->all());

        return response()->json($officer, 201);
    }
}
