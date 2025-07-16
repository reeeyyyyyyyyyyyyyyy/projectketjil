<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\User;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::with('user')->latest()->paginate(10);
        return view('admin.officers.index', compact('officers'));
    }

    public function create()
    {
        $users = User::doesntHave('officer')->get(); // hanya user yang belum jadi petugas
        return view('admin.officers.form', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:officers,user_id',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone_extension' => 'required|string|max:20',
        ]);

        $officer = Officer::create($request->all());

        return redirect()->route('admin.officers.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function show(Officer $officer)
    {
        return view('admin.officers.show', compact('officer'));
    }

    public function edit(Officer $officer)
    {
        $users = User::all();
        return view('admin.officers.form', compact('officer', 'users'));
    }

    public function update(Request $request, Officer $officer)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:officers,user_id,' . $officer->id,
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone_extension' => 'required|string|max:20',
        ]);

        $officer->update($request->all());

        return redirect()->route('admin.officers.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();

        return redirect()->route('admin.officers.index')->with('success', 'Petugas berhasil dihapus.');
    }
}
