@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white rounded-xl shadow-md p-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-primary">Konfirmasi Password</h2>
            <p class="mt-2 text-sm text-gray-600">
                Harap konfirmasi password Anda sebelum melanjutkan
            </p>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('password.confirm') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Konfirmasi Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
