@extends('layouts.app')

@section('content')
<div class="min-h-screen hero-bg flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white rounded-2xl shadow-xl p-10 relative z-10">
        <div class="text-center">
            <img class="mx-auto h-20 w-auto" src="{{ asset('assets/logo-dpmptsp.png') }}" alt="DPMPTSP Jatim">
            <h2 class="mt-6 text-3xl font-extrabold text-primary">Masuk sebagai Guest</h2>
            <p class="mt-2 text-sm text-gray-600">
                Lacak dokumen tanpa login akun
            </p>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('guest.login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="tracking_number" class="block text-sm font-medium text-gray-700">Nomor Tracking</label>
                    <input id="tracking_number" name="tracking_number" type="text" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                        placeholder="DPM-JT-2023-XXXXX">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Pemohon</label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                        placeholder="email@contoh.com">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Lacak Dokumen
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                <a href="{{ route('login') }}" class="font-medium text-primary hover:text-secondary">
                    Kembali ke halaman login
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
