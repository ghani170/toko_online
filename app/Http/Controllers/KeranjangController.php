<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
   public function tambah(Request $request, $id)
   {
    $user = Auth::user();
    $quantity = $request->input('quantity', 1);
    $cart = Cart::where('user_id', $user->id)->where('product_id', $id)->first();
    $product = \App\Models\Product::findOrFail($id);

    $totalQuantity = $cart ? $cart->quantity + $quantity : $quantity;
    $sisaStock = $product->stock - $totalQuantity;

    if ($totalQuantity > $product->stock) {
        return back()->with('error', 'Jumlah Melebihi Stock')->with('sisa_stock', $sisaStock);
    }

    if($cart) {
        $cart->quantity += $quantity;
        $cart->save();
    } else {
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $id,
            'quantity' => $request->input('quantity', 1)
        ]);
    }

    return redirect()->route('keranjang.index');
   }

   public function index()
   {
    $user = Auth::user();
    $carts = Cart::where('user_id', $user->id)->get();
    return view('toko.keranjang', compact('carts'));
   }

   public function hapus($id)
   {
    $user = Auth::user();
    $deleted = Cart::where('user_id', $user->id)->where('product_id', $id)->delete();
    return redirect()->route('keranjang.index')->with('success', 'Produk berhasil dihapus dari keranjang');
   }

   public function checkout()
   {
    $user = Auth::user();
    $carts = \App\Models\Cart::with('product')->where('user_id', $user->id)->get();
    $total = $carts->sum(function($cart){
        return $cart->product->price * $cart->quantity;
    });
    return view('toko.checkout', compact('carts', 'total' ));
   }

   public function processCheckout(Request $request)
   {
    $user = Auth::user();
    $carts = \App\Models\Cart::with('product')->where('user_id', $user->id)->get();

    foreach ($carts as $cart) {
        $product = $cart->product;
        if ($cart->quantity > $product->stock) {
            return redirect()->route('keranjang.index')->with('error', 'Product ' . $product->name . ' tidak cukup. Sisa stock: ' . $product->stock);
        }
    }

    foreach ($carts as $cart) {
        $product = $cart->product;
        $product->stock -= $cart->quantity;
        $product->save();

    }

    $total = $carts->sum(function($cart){
        return $cart->product->price * $cart->quantity;
    });

    $order = \App\Models\Order::create([
        'user_id' => $user->id,
        'total' => $total,
        'status' => 'pending',
        'metode_pembayaran' => $request->metode_pembayaran,
    ]);
    
    foreach ($carts as $cart ) {
        \App\Models\OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity,
            'price' => $cart->product->price,
        ]);
    }

    \App\Models\Cart::where('user_id', $user->id)->delete();

    return redirect()->route('keranjang.index')->with('success', 'Pembayaran berhasil! Terima kasih sudah berbelanja.');
   }
}

