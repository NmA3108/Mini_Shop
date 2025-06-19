@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Sửa sản phẩm</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-semibold mb-1">Tên sản phẩm</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <label for="description" class="block font-semibold mb-1">Mô tả</label>
            <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="price" class="block font-semibold mb-1">Giá (VNĐ)</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <!-- Bắt đầu phần thêm ảnh -->
        <div>
            <label class="block font-semibold mb-1">Ảnh hiện tại</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh sản phẩm" class="w-32 h-32 object-cover rounded mb-2">
            @else
                <p class="italic text-gray-500">Chưa có ảnh</p>
            @endif
        </div>

        <div>
            <label for="image" class="block font-semibold mb-1">Thay ảnh mới (nếu có)</label>
            <input type="file" name="image" id="image" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <!-- Kết thúc phần thêm ảnh -->

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="ml-4 text-gray-600 hover:underline">Hủy</a>
    </form>
</div>
@endsection
