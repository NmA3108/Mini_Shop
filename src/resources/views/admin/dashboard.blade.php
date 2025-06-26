{{-- filepath: c:\Users\5540\Pictures\Laravel-docker\src\resources\views\admin\dashboard.blade.php --}}
@extends('layouts.admin')

@section('main')
    <h1 class="text-3xl font-bold text-pink-600 mb-8">Chào mừng, {{ Auth::user()->name ?? 'Admin' }}!</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
        <!-- Card: Người dùng -->
        <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center hover:shadow-xl transition">
            <div class="text-5xl text-pink-500 mb-3"><i class="fas fa-users"></i></div>
            <div class="text-3xl font-bold">{{ $userCount }}</div>
            <div class="text-gray-500 mt-1">Người dùng</div>
        </div>
        <!-- Card: Sản phẩm -->
        <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center hover:shadow-xl transition">
            <div class="text-5xl text-pink-500 mb-3"><i class="fas fa-box"></i></div>
            <div class="text-3xl font-bold">{{ $productCount }}</div>
            <div class="text-gray-500 mt-1">Sản phẩm</div>
        </div>
        <!-- Card: Đơn hàng mới -->
        <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center hover:shadow-xl transition">
            <div class="text-5xl text-pink-500 mb-3"><i class="fas fa-file-invoice-dollar"></i></div>
            <div class="text-3xl font-bold">{{ $orderCount }}</div>
            <div class="text-gray-500 mt-1">Đơn hàng mới</div>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-xl font-bold text-pink-600 mb-4">Chức năng nhanh</h2>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.users') }}" class="bg-pink-100 text-pink-700 px-4 py-2 rounded-lg font-semibold hover:bg-pink-200 transition">Quản lý người dùng</a>
            <a href="{{ route('admin.settings') }}" class="bg-pink-100 text-pink-700 px-4 py-2 rounded-lg font-semibold hover:bg-pink-200 transition">Cài đặt</a>
            <a href="{{ route('admin.reports') }}" class="bg-pink-100 text-pink-700 px-4 py-2 rounded-lg font-semibold hover:bg-pink-200 transition">Báo cáo</a>
        </div>
    </div>
@endsection
