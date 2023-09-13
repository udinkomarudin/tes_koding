<!-- resources/views/products/index.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!-- Center-align the row horizontally -->

       <div class="container" style="padding: 3em;">
        @foreach ($products as $product)
            <div class="col-md-6" style="margin-bottom: 20px; border: 1px solid darkgray; padding: 2em;">
                <div class="d-flex align-items-center">
                    <img class="mr-3" src="{{ Storage::url('product/rinso.jpg') }}" alt="Your Image" style="width: 200px; height: 200px;">
                    <div>
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">Rp {{ $product->price }}</p>
                    </div>
                    <a href="{{ url('/products/' . $product['id']) }}" class="btn btn-success ml-auto">Buy</a>
                </div>
            </div>
        @endforeach
                <button class="btn btn-primary">Chekout</button>
    </div>

     </div>
    </div>

@endsection


