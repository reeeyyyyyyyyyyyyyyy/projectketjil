<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - DPMPTSP Jatim</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .sidebar {
            width: 250px;
            transition: all 0.3s;
        }
        .content {
            margin-left: 250px;
            transition: all 0.3s;
        }
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            .content {
                margin-left: 0;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .content.active {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar bg-darkblue text-white fixed h-full overflow-y-auto z-10">
            <div class="p-4 border-b border-blue-800">
                <img src="{{ asset('assets/logo-dpmptsp-white.png') }}" alt="DPMPTSP Jatim" class="h-12 mx-auto">
                <p class="text-center text-sm mt-2 text-gray-300">Administrator System</p>
            </div>
            <nav class="mt-5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-white bg-blue-900">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.document-types.index') }}" class="flex items-center px-6 py-3 text-white hover:bg-blue-800">
                    <i class="fas fa-file-alt mr-3"></i>
                    Jenis Dokumen
                </a>
                <a href="{{ route('admin.documents.index') }}" class="flex items-center px-6 py-3 text-white hover:bg-blue-800">
                    <i class="fas fa-file-contract mr-3"></i>
                    Dokumen
                </a>
                <a href="{{ route('admin.officers.index') }}" class="flex items-center px-6 py-3 text-white hover:bg-blue-800">
                    <i class="fas fa-users mr-3"></i>
                    Petugas
                </a>
                <a href="{{ route('admin.reports.index') }}" class="flex items-center px-6 py-3 text-white hover:bg-blue-800">
                    <i class="fas fa-chart-bar mr-3"></i>
                    Laporan
                </a>
                <a href="{{ route('admin.settings') }}" class="flex items-center px-6 py-3 text-white hover:bg-blue-800">
                    <i class="fas fa-cog mr-3"></i>
                    Pengaturan
                </a>
            </nav>
        </div>

        <!-- Content -->
        <div class="content w-full">
            <!-- Topbar -->
            <div class="bg-white shadow">
                <div class="flex justify-between items-center py-3 px-4">
                    <div>
                        <button id="sidebarToggle" class="md:hidden text-gray-600">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-primary">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.content').classList.toggle('active');
        });
    </script>
</body>
</html>
