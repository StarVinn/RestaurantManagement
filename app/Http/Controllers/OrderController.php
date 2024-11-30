<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu')->get(); // Eager load menu details
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all(); // Retrieve all menus for selection
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'menu_id' => 'required|exists:menus,id',
            'order_date' => 'required|date',
        ]);

        $menu = Menu::findOrFail($request->menu_id);
        $totalPrice = $menu->price; // Set total price based on menu price

        Order::create([
            'customer_name' => $request->customer_name,
            'menu_id' => $request->menu_id,
            'order_date' => $request->order_date,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.details', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
