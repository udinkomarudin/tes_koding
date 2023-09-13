@extends('layouts.app')

@section('content')
    <h1>Edit Pesanan</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="no_pesanan">No Pesanan</label>
            <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" value="{{ $order->no_pesanan }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $order->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="nm_supplier">Nama Supplier</label>
            <input type="text" class="form-control" id="nm_supplier" name="nm_supplier" value="{{ $order->nm_supplier }}" required>
        </div>
        <div class="form-group">
            <label for="nm_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nm_produk" name="nm_produk" value="{{ $order->nm_produk }}" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" class="form-control" id="total" name="total" value="{{ $order->total }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
resources/views/orders/form.blade.php

html
Copy code
<div class="form-group">
    <label for="no_pesanan">No Pesanan</label>
    <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" value="{{ old('no_pesanan', isset($order) ? $order->no_pesanan : '') }}" required>
</div>
<div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', isset($order) ? $order->tanggal : '')




