@extends('layouts.admin')

@section('main')
    <h1 class="text-2xl font-bold text-pink-600 mb-4">Quản lý người dùng</h1>
    <table class="min-w-full bg-white rounded-xl shadow mb-6">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Tên</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                <td class="py-2 px-4 border-b">{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection