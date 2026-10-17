<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'products' => Product::where('type', 'physical')->get(),
            'plans' => Product::where('type', 'subscription')->get(),
        ]);
    }

    public function subscriptions()
    {
        return view('pages.subscriptions', ['plans' => Product::where('type', 'subscription')->get()]);
    }

    public function show(Product $product)
    {
        return view('pages.product', compact('product'));
    }

    public function checkout(Product $product)
    {
        return view('pages.checkout', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|email|max:100',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => $product->isSubscription() ? 'nullable|string|max:500' : 'required|string|max:500',
            'qty' => 'nullable|integer|min:1|max:50',
        ]);

        $qty = $product->isSubscription() ? 1 : ($data['qty'] ?? 1);

        $order = Order::create([
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_phone' => $data['customer_phone'],
            'customer_address' => $data['customer_address'] ?? null,
            'order_id' => 'AB-'.now()->format('ymd').'-'.strtoupper(Str::random(6)),
            'product_id' => $product->id,
            'qty' => $qty,
            'gross_amount' => $product->price * $qty,
        ]);

        // Halaman pembayaran tetap berada di domain yang sama.
        return redirect()->route('pay', $order);
    }

    public function pay(Order $order)
    {
        if ($order->status !== 'pending') {
            return redirect()->route('order', $order);
        }

        return view('pages.pay', compact('order'));
    }

    public function simulate(Request $request, Order $order)
    {
        $request->validate([
            'method' => 'required|in:qris,va_bca,va_bni,gopay,card',
            'result' => 'required|in:success,failed',
        ]);

        if ($order->status === 'pending') {
            $order->update([
                'status' => $request->result === 'success' ? 'paid' : 'failed',
                'payment_method' => $request->method,
                'paid_at' => $request->result === 'success' ? now() : null,
            ]);
        }

        return redirect()->route('order', $order);
    }

    public function order(Order $order)
    {
        return view('pages.order', compact('order'));
    }
}
