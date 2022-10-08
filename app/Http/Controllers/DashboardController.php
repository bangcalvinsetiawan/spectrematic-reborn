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

    public function showorderlimit()
    {
        return view('dashboard.index');
    }

    public function fetchorder()
    {
        $orders = Order::all();
        return response()->json([
            'orders'=>$orders,
        ]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if($order)
        {
            $order->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Order Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Order Found.'
            ]);
        }
    }
}
