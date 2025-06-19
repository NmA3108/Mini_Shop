@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-xl mt-10 animate__animated animate__fadeInDown">
    <h1 class="text-3xl font-bold text-center text-indigo-600 mb-6 flex items-center justify-center gap-2">
        <i class="fas fa-plus-circle"></i> Thêm sản phẩm mới
    </h1>

    <<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    <div>
        <label for="name" class="block text-lg font-medium text-gray-700">Tên sản phẩm</label>
        <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
    </div>

    <div>
        <label for="description" class="block text-lg font-medium text-gray-700">Mô tả</label>
        <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
    </div>

    <div>
        <label for="price" class="block text-lg font-medium text-gray-700">Giá (VNĐ)</label>
        <input type="number" name="price" id="price" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
    </div>

    <!-- Thêm input upload ảnh -->
    <div>
        <label for="image" class="block text-lg font-medium text-gray-700">Ảnh sản phẩm</label>
        <input type="file" name="image" id="image" accept="image/*" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div class="flex justify-end space-x-3 mt-6">
        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
            <i class="fas fa-times-circle"></i> Hủy
        </a>
        <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition font-semibold">
            <i class="fas fa-save"></i> Lưu
        </button>
    </div>
</form>

</div>
@endsection
