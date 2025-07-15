@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Pengaturan Sistem</h1>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="app_name" class="block text-sm font-medium text-gray-700">Nama Aplikasi</label>
                <input type="text" name="app_name" id="app_name" value="{{ old('app_name', setting('app_name')) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>

            <div>
                <label for="timezone" class="block text-sm font-medium text-gray-700">Zona Waktu</label>
                <select name="timezone" id="timezone" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    @foreach(timezone_identifiers_list() as $tz)
                    <option value="{{ $tz }}" {{ old('timezone', setting('timezone')) == $tz ? 'selected' : '' }}>{{ $tz }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="date_format" class="block text-sm font-medium text-gray-700">Format Tanggal</label>
                <select name="date_format" id="date_format" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="d/m/Y" {{ old('date_format', setting('date_format')) == 'd/m/Y' ? 'selected' : '' }}>DD/MM/YYYY</option>
                    <option value="m/d/Y" {{ old('date_format', setting('date_format')) == 'm/d/Y' ? 'selected' : '' }}>MM/DD/YYYY</option>
                    <option value="Y-m-d" {{ old('date_format', setting('date_format')) == 'Y-m-d' ? 'selected' : '' }}>YYYY-MM-DD</option>
                </select>
            </div>

            <div>
                <label for="items_per_page" class="block text-sm font-medium text-gray-700">Item per Halaman</label>
                <input type="number" name="items_per_page" id="items_per_page" value="{{ old('items_per_page', setting('items_per_page', 10)) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">Simpan Pengaturan</button>
        </div>
    </form>
</div>
@endsection
