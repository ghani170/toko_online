<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::with('user', 'orderItems.product')->orderBy('created_at', 'asc')->get();

        $totalRevenue = 0;
        foreach ($orders as $order) {
            foreach ($order->orderItems as $item){
                if ($item->product) {
                    $totalRevenue += ($item->quantity * $item->product->price);
                }
            }
        }

        return view('admin.orders', compact('orders', 'totalRevenue'));

        

    }

    public function destroy($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Orderan berhasil dihapus');

    }

    public function updateStatus(Request $request, Order $order)
    {
        
        $request->validate([
            'status' => 'required|in:pending,diantar,diterima'
        ]);
        
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Status pesanan berhasil diupdate.');
    }

    public function orderDetail($id)
    {
        $order = \App\Models\Order::with(['user', 'orderItems.product'])->findOrFail($id);
        return view('admin.order_detail', compact('order'));
    }
}
