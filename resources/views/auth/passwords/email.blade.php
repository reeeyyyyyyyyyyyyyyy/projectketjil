@extends('layouts.app')

@section('content')
    <div class="min-h-screen hero-bg flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white rounded-2xl shadow-xl p-10 relative z-10">
            <div class="text-center">
                <img class="mx-auto h-20 w-auto" src="{{ asset('assets/logo-dpmptsp.png') }}" alt="DPMPTSP Jatim">
                <h2 class="mt-6 text-3xl font-extrabold text-primary">Reset Password</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Masukkan email Anda untuk menerima link reset password.
                </p>
            </div>

            @if (session('status'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-4">
                    <p class="text-sm text-green-700">{{ session('status') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                    <p class="text-sm text-red-700">
                        {{ $errors->first() }}
                    </p>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Kirim Link Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
