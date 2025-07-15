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
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                <i class="fas fa-spinner text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500">Dokumen Diproses</p>
                <h3 class="text-2xl font-bold">{{ $stats['pending_documents'] }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <i class="fas fa-check-circle text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500">Dokumen Selesai</p>
                <h3 class="text-2xl font-bold">{{ $stats['completed_documents'] }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                <i class="fas fa-users text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500">Total Petugas</p>
                <h3 class="text-2xl font-bold">{{ $stats['total_staff'] }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Recent Documents -->
<div class="bg-white shadow rounded-lg p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Dokumen Terbaru</h2>
        <a href="{{ route('admin.documents.index') }}" class="text-primary hover:underline">Lihat Semua</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Tracking</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Dokumen</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pemohon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($recentDocuments as $document)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.documents.show', $document->id) }}" class="text-primary hover:underline">
                            {{ $document->tracking_number }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $document->documentType->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $document->applicant_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if($document->status == 'Selesai') bg-green-100 text-green-800
                            @elseif($document->status == 'Ditolak') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $document->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $document->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Statistik Bulanan</h2>
        <canvas id="monthlyChart" height="300"></canvas>
    </div>
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Jenis Perizinan</h2>
        <canvas id="documentTypesChart" height="300"></canvas>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Monthly Chart
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Pengajuan',
                data: [120, 190, 170, 200, 180, 150, 210, 190, 230, 250, 220, 240],
                backgroundColor: 'rgba(12, 60, 120, 0.7)',
                borderColor: 'rgba(12, 60, 120, 1)',
                borderWidth: 1
            }, {
                label: 'Selesai',
                data: [100, 170, 150, 180, 160, 130, 190, 170, 210, 230, 200, 220],
                backgroundColor: 'rgba(15, 157, 88, 0.7)',
                borderColor: 'rgba(15, 157, 88, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Document Types Chart
    const typesCtx = document.getElementById('documentTypesChart').getContext('2d');
    const typesChart = new Chart(typesCtx, {
        type: 'doughnut',
        data: {
            labels: ['IMB', 'HO', 'TDP', 'SIUP', 'AMDAL', 'Lainnya'],
            datasets: [{
                data: [300, 150, 200, 120, 80, 50],
                backgroundColor: [
                    '#0C3C78',
                    '#0F9D58',
                    '#FFC107',
                    '#4285F4',
                    '#DB4437',
                    '#9E9E9E'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                }
            }
        }
    });
</script>
@endpush
