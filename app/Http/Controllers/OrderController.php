<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Ambil produk
        $product = Product::find($request->product_id);

        // Cek stok
        if ($product->stock > 0) {
            // Kurangi stok
            $product->decrement('stock');
            // Simpan pesanan (tambahkan logika penyimpanan sesuai kebutuhan)

            return redirect()->route('landing')->with('success', 'Pesanan berhasil dibuat!');
        }

        return redirect()->route('landing')->with('error', 'Stok tidak cukup!');
    }
}
