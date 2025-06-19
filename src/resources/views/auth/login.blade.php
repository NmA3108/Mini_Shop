@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-100 via-pink-200 to-pink-300 py-12 px-6">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md animate__animated animate__fadeInUp">
        <h2 class="text-3xl font-extrabold text-center text-pink-600 mb-6">
            🛍️ Đăng nhập vào Mini Shop
        </h2>
        
        {{-- Flash message nếu có lỗi --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form login --}}
        <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" autocomplete="email" required
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded text-pink-600 border-gray-300 focus:ring-pink-500">
                    <span class="ml-2 text-sm text-gray-600">Ghi nhớ đăng nhập</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-pink-500 hover:underline">Quên mật khẩu?</a>
            </div>

            <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 px-4 rounded-lg transition shadow-md">
                Đăng nhập
            </button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-600">
            Chưa có tài khoản?
            <a href="{{ route('register') }}" class="text-pink-500 font-semibold hover:underline">Đăng ký ngay</a>
        </p>
    </div>
</div>
@endsection
