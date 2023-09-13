<!-- resources/views/products/index.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!-- Center-align the row horizontally -->

            <div class="col-md-8"> <!-- Adjust the column width as needed -->

                <h1 class="text-center">Daftar Produk </h1>
                <!-- <div class="text-right mb-3">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
                </div> -->

                <table id="userTable" class="display">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>

             @foreach ($products as $product)
                <tr>
                    <td><img src="{{ $product['thumbnail'] }}" alt="{{ $product['title'] }}" class="thumbnail" width="200"></td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td><a href="{{ url('/products/' . $product['id']) }}">View</a></td>
                    <!-- Tambahkan data produk lainnya sesuai kebutuhan -->
                </tr>
            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
@endsection


