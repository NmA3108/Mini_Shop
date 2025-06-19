{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Đăng ký</h2>
            <form action="#" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700">Mật khẩu</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-bold text-gray-700">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-pink-500 rounded hover:bg-pink-600">
                    Đăng ký
                </button>
            </form>
        </div>
    </div>
@endsection
