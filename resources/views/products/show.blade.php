<!-- resources/views/products/show.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="container" style="padding: 3em;">
        <label>Product Detail</label>
            <div class="col-md-6" style="margin-bottom: 20px; border: 1px solid darkgray; padding: 2em;">
                <div class="d-flex align-items-center">
                    <img class="mr-3" src="{{ Storage::url('product/rinso.jpg') }}" alt="Your Image" style="width: 200px; height: 200px;">
                    <div class="col-md-12" >
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">Rp. {{ $product->price }}</p>
                        <p class="card-text">Dimension : {{ $product->dimension }}</p>
                        <p class="card-text">Price Unit : {{ $product->unit }}</p>
                       <a href="{{ url('/checkout/' . $product['id']) }}" class="btn btn-info ml-auto">Buy</a>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
