<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pegawai - DPMPTSP Jatim</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Similar to admin layout with different colors */
        .sidebar {
            width: 250px;
            background-color: #0F9D58; /* Green instead of blue */
        }
        .content {
            margin-left: 250px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar text-white fixed h-full overflow-y-auto z-10">
            <div class="p-4 border-b border-green-700">
                <img src="{{ asset('assets/logo-dpmptsp-white.png') }}" alt="DPMPTSP Jatim" class="h-12 mx-auto">
                <p class="text-center text-sm mt-2 text-gray-200">Staff Portal</p>
            </div>
            <nav class="mt-5">
                <a href="{{ route('staff.dashboard') }}" class="flex items-center px-6 py-3 text-white bg-green-700">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('staff.documents') }}" class="flex items-center px-6 py-3 text-white hover:bg-green-600">
                    <i class="fas fa-file-contract mr-3"></i>
                    Dokumen Saya
                </a>
                <a href="{{ route('staff.tracking') }}" class="flex items-center px-6 py-3 text-white hover:bg-green-600">
                    <i class="fas fa-search-location mr-3"></i>
                    Lacak Dokumen
                </a>
                <a href="{{ route('staff.profile') }}" class="flex items-center px-6 py-3 text-white hover:bg-green-600">
                    <i class="fas fa-user mr-3"></i>
                    Profil
                </a>
            </nav>
        </div>

        <!-- Content -->
        <div class="content w-full">
            <!-- Topbar -->
            <div class="bg-white shadow">
                <div class="flex justify-between items-center py-3 px-4">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold text-gray-800">@yield('title', 'Dashboard Pegawai')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center text-white">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-green-600">
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
</body>
</html>
