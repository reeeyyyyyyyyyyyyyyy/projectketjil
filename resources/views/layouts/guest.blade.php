<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pelanggan - DPMPTSP Jatim</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Topbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('guest.dashboard') }}" class="flex items-center">
                        <img src="{{ asset('assets/logo-dpmptsp.png') }}" alt="DPMPTSP Jatim" class="h-10">
                        <span class="ml-2 text-lg font-bold text-primary">Pelanggan</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('guest.documents') }}" class="text-gray-600 hover:text-primary">
                        <i class="fas fa-file-alt mr-1"></i> Dokumen Saya
                    </a>
                    <div class="relative">
                        <i class="fas fa-bell text-gray-600"></i>
                        <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-accent flex items-center justify-center text-primary font-bold">
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
    </nav>

    <!-- Main Content -->
    <main class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-8">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} DPMPTSP Provinsi Jawa Timur
            </p>
        </div>
    </footer>
</body>
</html>
