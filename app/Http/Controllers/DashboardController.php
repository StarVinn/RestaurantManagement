<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $menuCount = Menu::count();
    $orderCount = Order::count();

    return view('dashboard', compact('menuCount', 'orderCount'));
}
}
