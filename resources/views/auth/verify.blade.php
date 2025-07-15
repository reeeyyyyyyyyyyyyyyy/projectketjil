@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white rounded-xl shadow-md p-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-primary">Verifikasi Email Anda</h2>

            @if (session('resent'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">
                                Link verifikasi baru telah dikirim ke alamat email Anda
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <p class="mt-2 text-sm text-gray-600">
                Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi
            </p>
            <p class="mt-2 text-sm text-gray-600">
                Jika Anda tidak menerima email
            </p>
        </div>

        <form class="mt-4" action="{{ route('verification.resend') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Kirim Ulang Email Verifikasi
            </button>
        </form>
    </div>
</div>
@endsection
