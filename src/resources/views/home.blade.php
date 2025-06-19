@extends('layouts.app')

@section('content')
<div class="text-center mb-10">
    <h1 class="text-4xl font-extrabold text-pink-500 bg-gradient-to-r from-pink-400 via-pink-600 to-pink-500 bg-clip-text text-transparent animate__animated animate__fadeInDown">
        Chào mừng đến với Mini Shop!
    </h1>
    <p class="text-gray-700 mt-3 mb-12">Khám phá các sản phẩm siêu xinh ngay bên dưới 👇</p>
</div>

{{-- Thanh trượt carousel với nút điều hướng --}}
<div class="relative max-w-full mb-16">
    <button id="prevBtn" aria-label="Previous" 
      class="absolute top-1/2 left-2 -translate-y-1/2 bg-pink-500 hover:bg-pink-600 text-white rounded-full p-3 z-20 shadow-lg transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
           viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
    </button>
    <button id="nextBtn" aria-label="Next" 
      class="absolute top-1/2 right-2 -translate-y-1/2 bg-pink-500 hover:bg-pink-600 text-white rounded-full p-3 z-20 shadow-lg transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
           viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
      </svg>
    </button>

    <div id="carousel" class="flex space-x-6 px-6 py-8 overflow-x-auto scroll-smooth scrollbar-hide snap-x snap-mandatory">
        @foreach ($products as $product)
        <div
            onclick="openModal({{ $product->id }})"
            class="snap-start flex-shrink-0 w-56 rounded-xl shadow-lg bg-white hover:scale-105 transition-transform duration-300 cursor-pointer">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                class="w-full h-64 object-cover rounded-t-xl" />
            @else
            <div class="w-full h-64 bg-pink-200 flex items-center justify-center rounded-t-xl text-pink-400 text-6xl">
                <i class="fas fa-box-open"></i>
            </div>
            @endif
            <div class="p-4">
            <h3 class="text-pink-700 font-semibold truncate">{{ $product->name }}</h3>
            <p class="text-pink-500 font-bold text-lg">{{ number_format($product->price, 0, ',', '.') }}₫</p>
            </div>
        </div>

        {{-- Modal đẹp trai --}}
        <div id="modal-{{ $product->id }}"
            class="fixed inset-0 hidden items-center justify-center z-50 bg-black/30 backdrop-blur-sm transition-opacity duration-300">
            <div id="modal-content-{{ $product->id }}"
                class="bg-white rounded-2xl p-6 w-full max-w-md relative transform scale-95 opacity-0 transition-all duration-300 ease-out">
                <button onclick="closeModal({{ $product->id }})"
                        class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-lg font-bold">&times;</button>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-60 object-cover rounded-xl mb-4">
                @endif
                <h3 class="text-2xl font-bold text-pink-700 mb-2">{{ $product->name }}</h3>
                <p class="text-pink-600 font-semibold mb-2">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                <p class="text-gray-700">{{ $product->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Quản lý sản phẩm --}}
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mb-16">
    <h2 class="text-xl font-bold text-pink-600 mb-2">Quản lý sản phẩm</h2>
    <p class="text-gray-600 mb-4">Thêm, sửa, xoá sản phẩm trong kho hàng.</p>
    <a href="{{ route('products.index') }}" 
       class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 transition">
       Vào quản lý
    </a>
</div>

{{-- Phần chuyên nghiệp phía dưới --}}
<section class="max-w-7xl mx-auto p-10 bg-white rounded-lg shadow-md mb-20">
  <div class="grid md:grid-cols-3 gap-8 text-center">
    <div>
      <h3 class="text-pink-600 text-2xl font-semibold mb-3">Về Mini Shop</h3>
      <p class="text-gray-600">Cam kết sản phẩm chất lượng, dịch vụ tận tâm và trải nghiệm mua sắm tuyệt vời nhất.</p>
    </div>
    <div>
      <h3 class="text-pink-600 text-2xl font-semibold mb-3">Tính năng nổi bật</h3>
      <ul class="text-gray-600 list-disc list-inside space-y-1">
        <li>Kho sản phẩm đa dạng, cập nhật liên tục</li>
        <li>Thanh toán an toàn, bảo mật cao</li>
        <li>Giao hàng nhanh, đổi trả dễ dàng</li>
      </ul>
    </div>
    <div>
      <h3 class="text-pink-600 text-2xl font-semibold mb-3">Hỗ trợ khách hàng</h3>
      <p class="text-gray-600">Đội ngũ chăm sóc khách hàng tư vấn 24/7, luôn sẵn sàng hỗ trợ bạn.</p>
      <a href="#" class="inline-block mt-4 px-6 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
        Liên hệ ngay
      </a>
    </div>
  </div>
</section>

{{-- Scrollbar-hide --}}
<style>
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

{{-- JS cho modal + nút điều hướng carousel --}}
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('carousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const scrollAmount = 300;

    prevBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });
  });

  function openModal(id) {
    const modal = document.getElementById('modal-' + id);
    const content = document.getElementById('modal-content-' + id);

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
  }

  function closeModal(id) {
    const modal = document.getElementById('modal-' + id);
    const content = document.getElementById('modal-content-' + id);

    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }, 300);
  }
</script>
@endsection
