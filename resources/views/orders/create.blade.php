@extends('layout')

@section('content')
    <h1>Tambah Pesanan</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="no_pesanan">No Pesanan</label>
            <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="nm_supplier">Nama Supplier</label>
            <input type="text" class="form-control" id="nm_supplier" name="nm_supplier" required>
        </div>
        <div class="form-group">
            <label for="nm_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nm_produk" name="nm_produk" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" class="form-control" id="total" name="total" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection