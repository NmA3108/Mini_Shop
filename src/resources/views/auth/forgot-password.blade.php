<!-- resources/views/auth/forgot-password.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Quên mật khẩu</title>
</head>
<body>
    <h2>Quên mật khẩu</h2>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Gửi liên kết đặt lại mật khẩu</button>
    </form>
</body>
</html>
@extends('layouts.app')