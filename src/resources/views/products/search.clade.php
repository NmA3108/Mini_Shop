@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kết quả tìm kiếm cho: "{{ $keyword }}"</h1>

    @if($products->isEmpty())
        <p>Không tìm thấy sản phẩm nào phù hợp.</p>
    @else
        <ul class="list-group">
            @foreach($products as $product)
                <li class="list-group-item">
                    <strong>{{ $product->name }}</strong> - {{ $product->price }}đ
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
