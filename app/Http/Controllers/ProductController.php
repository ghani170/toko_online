<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
        
    }

    public function lihat($id)
    {
        $product = Product::findOrFail($id);
        return view('toko.lihatproduk', compact('product'));
    }
    
    public function create()
    {
        return view('admin.tambahproduk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer|min:0|max:10000000000',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1000000',
        ]);

        $data = $request->only('name', 'price', 'description', 'stock');

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(string $id)
    {
        // Kosongkan atau implementasi nanti jika perlu
    }

    public function edit(Product $product)
    {
        return view('admin.editproduk', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer|min:0|max:10000000000',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1000000',
        ]);

        $data = $request->only('name', 'price', 'description', 'stock');

        // Ganti gambar jika diupload baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar jika ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil dihapus');
    }

}
