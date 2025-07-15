@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">{{ isset($officer) ? 'Edit' : 'Tambah' }} Petugas</h1>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ isset($officer) ? route('admin.officers.update', $officer->id) : route('admin.officers.store') }}" method="POST">
        @csrf
        @if(isset($officer))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">Pengguna</label>
                <select name="user_id" id="user_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="">Pilih Pengguna</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ (isset($officer) && $officer->user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="department" class="block text-sm font-medium text-gray-700">Departemen</label>
                <input type="text" name="department" id="department" value="{{ old('department', $officer->department ?? '') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>

            <div>
                <label for="position" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <input type="text" name="position" id="position" value="{{ old('position', $officer->position ?? '') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>

            <div>
                <label for="phone_extension" class="block text-sm font-medium text-gray-700">Ekstensi Telepon</label>
                <input type="text" name="phone_extension" id="phone_extension" value="{{ old('phone_extension', $officer->phone_extension ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">Simpan</button>
            <a href="{{ route('admin.officers.index') }}" class="ml-2 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg">Batal</a>
        </div>
    </form>
</div>
@endsection
