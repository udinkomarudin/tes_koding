
@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!-- Center-align the row horizontally -->

            <div class="col-md-8"> <!-- Adjust the column width as needed -->

                <h1 class="text-center">Daftar Produk </h1>

                <table id="userTable" class="display">
                    <thead>
                    <h1 class="text-center">User List</h1>
                 <div class="mb-3">
                     <a href="{{ route('orders.create') }}">
                        <button class="btn btn-primary">Order</button>
                    </a>
                </div>
                        <tr>
                <th>No Pesanan</th>
                <th>Tanggal</th>
                <th>Nama Supplier</th>
                <th>Nama Produk</th>
                <th>Total</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->no_pesanan }}</td>
                    <td>{{ $order->tanggal }}</td>
                    <td>{{ $order->nm_supplier }}</td>
                    <td>{{ $order->nm_produk }}</td>
                    <td>{{ $order->total }}</td>
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