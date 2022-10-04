<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // return dd(Order::where('user_id', auth()->user()->id)->get());
        // $order = Order::where('user_id', auth()->user()->id)->get();
        // return dd($order);

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'orders' => Order::where('user_id', auth()->user()->id)->get(),
            // 'order' => $order
        ]);
    }
}
