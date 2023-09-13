<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Mengambil semua data produk dari model Product

        return view('products.index', compact('products'));

    }

    public function create()
    {
        return view('products.create');
    }

    // Metode untuk menyimpan pesanan baru ke database
    public function store(Request $request)
    {
        
        $request->validate([
            'product_code' => 'required|string|max:18',
            'product_name' => 'required|string|max:30',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Simpan pesanan ke database
        Product::create($request->all());

        return redirect('products.index')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    // Metode untuk menampilkan detail pesanan
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('products.show', compact('products'));
    }

    // Metode untuk menampilkan formulir edit pesanan
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('products.edit', compact('products'));
    }

    // Metode untuk menyimpan perubahan pesanan ke database
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'product_code' => 'required|string|max:18',
            'product_name' => 'required|string|max:30',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $products = Product::findOrFail($id);
        $products->update($request->all());

        return redirect('/products')->with('success', 'Pesanan berhasil diperbarui.');
    }

    // Metode untuk menghapus pesanan
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect('/products')->with('success', 'Pesanan berhasil dihapus.');
    }

}
