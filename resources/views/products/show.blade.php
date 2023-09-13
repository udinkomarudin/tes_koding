<!-- resources/views/products/show.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="product-details">
                <div class="product-image">
                    <img src="{{ $product['thumbnail'] }}" alt="{{ $product['title'] }}" class="thumbnail">
                </div>
                <!-- <div class="product-images" style="display: flex; flex-direction: row;">
                @foreach ($products['images'] as $image)
                    <div class="product-image-item">
                        <img src="{{ $image }}" alt="{{ $products['title'] }} Image" width="200">
                    </div>
                @endforeach
            </div> -->
                <div class="product-info">
                        <h2>{{ $product->product_name }}</h2>
                        <p>Kode Produk: {{ $product->product_code }}</p>
                        <p>Harga: {{ $product->price }}</p>
                        <p>Stok: {{ $product->stock }}</p>
                    
                    
                    <!-- Tambahkan informasi produk lainnya sesuai kebutuhan -->
                </div>
            </div>
</div>
</div>
@endsection
