<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

use App\Models\Transaction;

use App\Models\TransactionDetail;

use App\Models\Product;



class TransactionController extends Controller
{

   public function index($id)
    {
        // Mengambil transaksi berdasarkan ID
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return abort(404); // Atau lakukan penanganan jika transaksi tidak ditemukan
        }

        return view('transactions.index', compact('transaction'));
    }

    public function create()
    {
       
        return view('transactions.create');
    }

    public function store(Request $request)
{
    $username = Auth::user()->name;
    $currentDate = Carbon::now()->format('Y-m-d H:i:s');

    // Validasi input jika diperlukan

    // Simpan data transaksi ke dalam tabel 'transactions'
    $transaction = Transaction::create([
        'document_code' => "TRX",
        'document_number' => 001,
        'user' => $username,
        'total' => $request->input('price'),
        'date' => $currentDate,
    ]);

    // Simpan data detail transaksi ke dalam tabel 'transaction_details' berdasarkan produk
    $product = Product::findOrFail($request->input('id'));
    TransactionDetail::create([
        'document_code' => "TRX",
        'document_number' => 001,
        'transaction_id' => $transaction->id,
        'product_code' => $product->product_code, // Gantilah 'code' dengan nama kolom yang sesuai
        'price' => $product->price,
        'currency' => $product->currency,
        'quantity' => $request->input('quantity'), // Gantilah 'quantity' dengan nama yang sesuai dalam request
        'unit' => $product->unit,
        'sub_total' => $product->price * $request->input('quantity'), // Menghitung subtotal
    ]);

    // Redirect pengguna ke halaman detail transaksi
    return redirect()->route('transactions.show', ['id' => $transaction->id])->with('success', 'Transaksi berhasil ditambahkan.');
}


  //   public function store(Request $request)
  //   {
  //        $username = Auth::user()->name;
  //        $currentDate = Carbon::now()->format('Y-m-d H:i:s');
  //         // Validasi input jika diperlukan

  //        $transaction = Transaction::create([
  //               'document_code' => "TRX",
  //               'document_number' => 001,
  //               'user' => $username,
  //               'total' => $request->input('price'),
  //               'date' => $currentDate,
  //         ]);

  //       // Simpan data ke dalam tabel

  //      return redirect()->route('transactions.show', ['id' => $transaction->id])->with('success', 'Transaksi berhasil ditambahkan.');

  // }

    public function show($id)
    {
        
        $transactions = Transaction::findOrFail($id);
        return view('transactions.show', compact('transactions'));
    }



    public function confirm($id)
    {
    $transaction = Transaction::findOrFail($id);

    // Misalkan Anda ingin menyimpan detail transaksi ke dalam tabel transaction_details
    TransactionDetail::create([
        'transaction_id' => $transaction->id,
        'product_code' => $transaction->product_code, // Isi sesuai dengan kolom yang diperlukan
        'price' => $transaction->price,
        'currency' => $transaction->currency,
        // Isi dengan kolom-kolom lainnya
    ]);

    return view('transactions.confirm', compact('transaction'));
    }


    public function update(Request $request, $id)
    {
        
        $transaction = Transaction::findOrFail($id);
       $transaction->update($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
       
        $transaction = Transaction::findOrFail($id);
       $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
