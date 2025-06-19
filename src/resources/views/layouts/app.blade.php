<!DOCTYPE html>
<html>
<head>
    <title>Mini Shop - Laravel CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gradient-to-b from-pink-200 via-pink-50 to-white bg-no-repeat bg-[url('/images/ice-cream.png')] bg-right-bottom bg-contain min-h-screen">

    <!-- Navbar nâng cấp -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold text-pink-600 hover:text-pink-700">Mini Shop</a>
            
            <!-- Form tìm kiếm chính -->
            <form class="d-flex flex-grow-1 mx-4 max-w-md" action="{{ route('products.search') }}" method="GET" role="search">
                <input class="form-control form-control-sm me-2" name="q" type="search" placeholder="Tìm kiếm">
                <button class="btn btn-sm btn-outline-secondary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            
            <div class="flex items-center space-x-4">
                <!-- Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="text-pink-600 border border-pink-600 px-3 py-1 rounded hover:bg-pink-600 hover:text-white transition">
                        Menu <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="absolute mt-2 w-40 bg-white border rounded shadow-md z-10">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-100">Thêm sản phẩm</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-100">Thống kê</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-100">Cài đặt</a>
                    </div>
                </div>

                <!-- Link sản phẩm -->
                <a href="{{ route('products.index') }}" class="text-sm text-pink-600 hover:text-pink-700">Sản phẩm</a>

                <!-- Cart Icon -->
                <a href="#" class="relative text-pink-600 hover:text-pink-700">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <span class="absolute -top-1 -right-2 bg-pink-500 text-white text-xs px-1.5 rounded-full">3</span>
                </a>

                <!-- User (chưa có auth) -->
                <a href="{{ route('login') }}" class="flex items-center space-x-2 hover:text-pink-700">
                    <i class="fas fa-user-circle text-xl"></i>
                    <span class="text-sm">Đăng nhập</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Nội dung -->
    <main class="py-6 px-4 max-w-7xl mx-auto">
        @yield('content')
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
