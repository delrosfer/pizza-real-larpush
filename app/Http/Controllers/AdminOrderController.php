<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status;
use App\Events\OrderStatusChangedEvent;

class AdminOrderController extends Controller
{
     public function index()
    {
        $orders = Order::with(['customer', 'status'])->get();
        return view('admin.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        $statuses = Status::all();
        $currentStatus = $order->status_id;
        return view('admin.edit', compact('order', 'statuses', 'currentStatus'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status_id' => 'required|numeric',
        ]);

        $order->status_id = $request->status_id;
        $order->save();

        event(new OrderStatusChangedEvent($order));

        return back()->with('message', 'El estatus del pedido se actualizó exitosamente');
    }
}
