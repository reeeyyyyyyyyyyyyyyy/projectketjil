@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">{{ isset($documentType) ? 'Edit' : 'Tambah' }} Jenis Dokumen</h1>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ isset($documentType) ? route('admin.document-types.update', $documentType->id) : route('admin.document-types.store') }}" method="POST">
        @csrf
        @if(isset($documentType))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Jenis Dokumen</label>
                <input type="text" name="name" id="name" value="{{ old('name', $documentType->name ?? '') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>

            <div>
                <label for="processing_days" class="block text-sm font-medium text-gray-700">Hari Proses</label>
                <input type="number" name="processing_days" id="processing_days" value="{{ old('processing_days', $documentType->processing_days ?? '') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>

            <div>
                <label for="requirements" class="block text-sm font-medium text-gray-700">Persyaratan (Pisahkan dengan enter)</label>
                <textarea name="requirements" id="requirements" rows="5" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">{{ old('requirements', isset($documentType) ? implode("\n", json_decode($documentType->requirements)) : '') }}</textarea>
                <p class="mt-2 text-sm text-gray-500">Setiap persyaratan dipisahkan dengan baris baru</p>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">Simpan</button>
            <a href="{{ route('admin.document-types.index') }}" class="ml-2 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg">Batal</a>
        </div>
    </form>
</div>
@endsection
