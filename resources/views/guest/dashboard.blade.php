@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Dashboard Admin</h1>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-primary bg-opacity-10 text-primary mr-4">
                <i class="fas fa-file-alt text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500">Total Dokumen</p>
                <h3 class="text-2xl font-bold">{{ $stats['total_documents'] }}</h3>
            </div>
        </div>
    </div>
    <!-- Repeat for other stats -->
</div>

<!-- Recent Documents -->
<div class="bg-white shadow rounded-lg p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Dokumen Terbaru</h2>
        <a href="{{ route('admin.documents.index') }}" class="text-primary hover:underline">Lihat Semua</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <!-- Table content -->
        </table>
    </div>
</div>
@endsection
