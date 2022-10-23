<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);

        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'orders' => Order::where('user_id', auth()->user()->id)->get(),
            'user' => $user,
        ]);
    }

    // testing
    public function index2()
    {
        $user = User::findOrFail(auth()->user()->id);

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'orders' => Order::where('user_id', auth()->user()->id)->get(),
            'user' => $user,
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'signal' => 'required',
            'price' => 'required|max:12',
            'market' => 'required',
            'investment' => 'required|max:8',
            'duration' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $order = Order::firstOrCreate($validatedData);

        if ($order->wasRecentlyCreated) {
            return response()->json([
                'status'=>200,
                'message'=>'Order Added Successfully.'
            ]);
        } else {
            return response()->json([
                        'status'=>400,
                        'errors'=>$order->errors()
                    ]);
        }

    }


}
