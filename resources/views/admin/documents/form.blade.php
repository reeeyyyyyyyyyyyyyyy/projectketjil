@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">{{ isset($document) ? 'Edit' : 'Tambah' }} Dokumen</h1>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <form
            action="{{ isset($document) ? route('admin.documents.update', $document->id) : route('admin.documents.store') }}"
            method="POST">
            @csrf
            @if (isset($document))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Jenis Dokumen --}}
                <div>
                    <label for="document_type_id" class="block text-sm font-medium text-gray-700">Jenis Dokumen</label>
                    <select name="document_type_id" id="document_type_id" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="">Pilih jenis dokumen</option>
                        @foreach ($documentTypes as $type)
                            <option value="{{ $type->id }}"
                                {{ old('document_type_id', isset($document) ? $document->document_type_id : '') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Nama Pemohon --}}
                <div>
                    <label for="applicant_name" class="block text-sm font-medium text-gray-700">Nama Pemohon</label>
                    <input type="text" name="applicant_name" id="applicant_name"
                        value="{{ old('applicant_name', isset($document) ? $document->applicant_name : '') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">

                </div>

                {{-- Email Pemohon --}}
                <div>
                    <label for="applicant_email" class="block text-sm font-medium text-gray-700">Email Pemohon</label>
                    <input type="email" name="applicant_email" id="applicant_email"
                        value="{{ old('applicant_email', $document->applicant_email ?? '') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                </div>

                {{-- Telepon Pemohon --}}
                <div>
                    <label for="applicant_phone" class="block text-sm font-medium text-gray-700">Telepon Pemohon</label>
                    <input type="text" name="applicant_phone" id="applicant_phone"
                        value="{{ old('applicant_phone', $document->applicant_phone ?? '') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                </div>
            </div>

            {{-- Alamat Usaha --}}
            <div class="mt-6">
                <label for="business_address" class="block text-sm font-medium text-gray-700">Alamat Usaha</label>
                <textarea name="business_address" id="business_address" rows="3" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">{{ old('business_address', $document->business_address ?? '') }}</textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">Simpan Dokumen</button>
                <a href="{{ route('admin.documents.index') }}"
                    class="ml-2 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg">Batal</a>
            </div>
        </form>
    </div>
@endsection
