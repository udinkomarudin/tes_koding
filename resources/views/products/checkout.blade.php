
@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container" style="padding: 3em;">
            <label>Checkout Page</label>
            <form method="post" action="{{ route('transactions.store') }}">
                @csrf
                <div class="col-md-6" style="margin-bottom: 20px; border: 1px solid darkgray; padding: 2em;">
                    <div class="d-flex align-items-center">
                        <img class="mr-3" src="{{ Storage::url('product/rinso.jpg') }}" alt="Your Image" style="width: 200px; height: 200px;">
                        <div class="col-md-12">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">Rp. {{ $product->price }}</p>
                            <input type="text" class="form-control"  name="price" value="{{ $product->price }}" hidden>
                            <input type="text" class="form-control"  name="id" value="{{ $product->id }}" hidden>

                            <div class="form-group col-md-3">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                            </div>
                            <p>Sub Total: Rp. <span id="totalPrice">{{ $product->price }}</span></p>
                            <button type="submit" class="btn btn-info ml-auto">Buy</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    document.getElementById('quantity').addEventListener('input', function () {
        const quantity = parseInt(this.value);
        const price = {{ $product->price }};
        const total = quantity * price;

        document.getElementById('totalPrice').innerText = total.toFixed(2);
    });
</script>

@endsection
