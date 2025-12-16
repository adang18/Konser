<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Concert;
use App\Models\TicketCategory;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function adminList(Request $request)
    {
        $status = $request->status;

        $orders = Order::with(['concert', 'ticketCategory'])
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->get();

        return view('admin.orders', compact('orders', 'status'));
    }

    public function checkoutForm(Request $request)
    {
        $concert = Concert::findOrFail($request->concert_id);
        $category = TicketCategory::findOrFail($request->ticket_category_id);

        $qty = (int)$request->quantity;
        $total = $qty * $category->price;

        return view('orders.checkout', compact('concert', 'category', 'qty', 'total'));
    }

    public function detail($id)
    {
        $order = Order::with(['concert', 'ticketCategory'])->findOrFail($id);
        return view('order-detail', compact('order'));
    }

    public function completeOrder(Request $request)
    {
        $validated = $request->validate([
            'concert_id'          => 'required',
            'ticket_category_id'  => 'required',
            'buyer_name'          => 'required',
            'buyer_email'         => 'required|email',
            'buyer_phone'         => 'required',
            'quantity'            => 'required|integer|min:1',
            'payment_method'      => 'required',
        ]);

        $category = TicketCategory::findOrFail($request->ticket_category_id);

        $validated['total_price'] = $validated['quantity'] * $category->price;

        $validated['ticket_code'] = 'TIKET-' . strtoupper(uniqid());

        $validated['status'] = 'pending';

        $validated['payment_method'] = $request->payment_method;

        Order::create($validated);

        return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function updateStatus(Request $request, $id)
        {
            $order = Order::findOrFail($id);

            if ($request->status) {
                $order->status = $request->status;
            }

            if ($request->payment_method) {
                $order->payment_method = $request->payment_method;
            }

            $order->save();

            return back()->with('success', 'Order berhasil diperbarui!');
        }


    public function updatePayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->payment_method = $request->payment_method;
        $order->save();

        return back()->with('success', 'Metode pembayaran berhasil diperbarui!');
    }

}
