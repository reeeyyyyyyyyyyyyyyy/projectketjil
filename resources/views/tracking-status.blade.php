@extends('layouts.app')

@section('content')
<section class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-2xl font-bold text-center text-primary mb-8">Status Pelacakan Dokumen</h1>

        @if($document)
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">{{ $document->documentType->name }}</h2>
                            <p class="text-gray-600">No. Tracking: {{ $document->tracking_number }}</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                                @if($document->status === 'Selesai') bg-green-100 text-green-800
                                @elseif($document->status === 'Ditolak') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $document->status }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-800 mb-2">Informasi Pemohon</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                                <p class="text-sm text-gray-600">Tanggal Pengajuan</p>
                                <p class="font-medium">{{ $document->submission_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Proses Dokumen</h3>
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
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="mb-6">
                    <i class="fas fa-search text-5xl text-gray-300 mb-4"></i>
                    <h2 class="text-xl font-medium text-gray-700">Lacak Status Dokumen Anda</h2>
                    <p class="text-gray-500 mt-2">Masukkan nomor tracking untuk melihat status terkini</p>
                </div>

                <form action="{{ route('tracking.status') }}" method="GET" class="max-w-md mx-auto">
                    <div class="relative">
                        <input
                            type="text"
                            name="tracking_number"
                            placeholder="Masukkan nomor tracking"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent pr-12"
                            required
                        >
                        <button type="submit" class="absolute right-3 top-3 text-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <p class="text-gray-600">Atau <a href="{{ route('guest.login') }}" class="text-primary font-medium">masuk sebagai guest</a> untuk melacak dokumen</p>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
