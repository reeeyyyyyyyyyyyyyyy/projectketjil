@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Detail Petugas</h1>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase">Nama</h2>
            <p class="mt-1 text-gray-900">{{ $officer->user->name }}</p>
        </div>

        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase">Email</h2>
            <p class="mt-1 text-gray-900">{{ $officer->user->email }}</p>
        </div>

        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase">Departemen</h2>
            <p class="mt-1 text-gray-900">{{ $officer->department }}</p>
        </div>

        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase">Jabatan</h2>
            <p class="mt-1 text-gray-900">{{ $officer->position }}</p>
        </div>

        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase">Nomor Ekstensi</h2>
            <p class="mt-1 text-gray-900">{{ $officer->phone_extension }}</p>
        </div>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('admin.officers.index') }}" class="text-gray-600 hover:text-primary text-sm">&larr; Kembali ke Daftar Petugas</a>
        <div class="flex space-x-3">
            <a href="{{ route('admin.officers.edit', $officer->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-yellow-600">Edit</a>
            <form action="{{ route('admin.officers.destroy', $officer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus petugas ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
