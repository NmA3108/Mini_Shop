{{-- filepath: resources/views/layouts/admin.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg rounded-r-3xl p-6 flex flex-col justify-between">
        <div>
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-pink-600">Mini Shop Admin</h2>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-pink-50 {{ request()->routeIs('admin.dashboard') ? 'bg-pink-100 font-bold' : '' }}">
                    <i class="fas fa-chart-line mr-3 text-pink-500"></i> Dashboard
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-pink-50 {{ request()->routeIs('admin.users') ? 'bg-pink-100 font-bold' : '' }}">
                    <i class="fas fa-users mr-3 text-pink-500"></i> Người dùng
                </a>
                <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-pink-50 {{ request()->routeIs('admin.settings') ? 'bg-pink-100 font-bold' : '' }}">
                    <i class="fas fa-cog mr-3 text-pink-500"></i> Cài đặt
                </a>
                <a href="{{ route('admin.reports') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-pink-50 {{ request()->routeIs('admin.reports') ? 'bg-pink-100 font-bold' : '' }}">
                    <i class="fas fa-file-alt mr-3 text-pink-500"></i> Báo cáo
                </a>
            </nav>
        </div>
        <div class="mt-8">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-pink-200 rounded-full flex items-center justify-center text-xl font-bold text-pink-700">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div class="font-semibold">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Main content -->
    <main class="flex-1 p-10">
        @yield('main')
    </main>
</div>
@endsection