@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4 text-pink-600">Kết quả tìm kiếm cho: <span class="text-pink-500">"{{ $keyword }}"</span></h2>
    @if($products->isEmpty())
        <div class="bg-pink-50 text-pink-700 p-4 rounded">Không tìm thấy sản phẩm nào phù hợp.</div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 hover:shadow-xl transition">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover rounded-xl border border-pink-100">
                    @else
                        <div class="w-24 h-24 flex items-center justify-center bg-pink-100 rounded-xl text-pink-400 text-3xl">
                            <i class="fas fa-box"></i>
                        </div>
                    @endif
                    <div>
                        <div class="font-bold text-lg text-pink-700">{{ $product->name }}</div>
                        <div class="text-gray-500 mb-2">{{ $product->description }}</div>
                        <div class="font-bold text-xl text-pink-600">{{ $product->price }}đ</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
