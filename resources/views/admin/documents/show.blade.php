@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Detail Dokumen</h1>
    <p class="text-gray-600">No. Tracking: {{ $document->tracking_number }}</p>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h2 class="text-lg font-bold text-gray-800 mb-4">Informasi Dokumen</h2>

            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-600">Jenis Dokumen</p>
                    <p class="font-medium">{{ $document->documentType->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Tanggal Pengajuan</p>
                    <p class="font-medium">{{ $document->submission_date->format('d/m/Y') }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Status</p>
                    <p class="font-medium">
                        <span class="px-2 py-1 rounded-full text-xs
                            @if($document->status == 'Selesai') bg-green-100 text-green-800
                            @elseif($document->status == 'Ditolak') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $document->status }}
                        </span>
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Catatan</p>
                    <p class="font-medium">{{ $document->notes ?? '-' }}</p>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-lg font-bold text-gray-800 mb-4">Informasi Pemohon</h2>

            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-600">Nama</p>
                    <p class="font-medium">{{ $document->applicant_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-medium">{{ $document->applicant_email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Telepon</p>
                    <p class="font-medium">{{ $document->applicant_phone }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Alamat</p>
                    <p class="font-medium">{{ $document->business_address }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Riwayat Proses</h2>

        <div class="relative pl-8 border-l-2 border-primary">
            @foreach($document->trackingHistories as $history)
            <div class="mb-8 relative">
                <div class="absolute -left-11 w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white">
                    <i class="fas fa-check"></i>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-medium text-gray-800">{{ $history->processStep->step_name }}</h4>
                    <p class="text-sm text-gray-600">{{ $history->department }}</p>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $history->created_at->format('d M Y H:i') }}
                        @if($history->completed_at)
                        - {{ $history->completed_at->format('d M Y H:i') }}
                        @endif
                    </p>
                    @if($history->notes)
                    <div class="mt-2 p-2 bg-blue-50 border border-blue-100 rounded">
                        <p class="text-sm text-blue-800">{{ $history->notes }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('admin.documents.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg">Kembali</a>
    </div>
</div>
@endsection
