<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
                'message'=>'Student Added Successfully.'
            ]);
            // new user
            // return redirect('/dashboard')
            // ->with('success', 'New order has been placed!');
        } else {
            // user already exists
            // return redirect('/order')
            // ->with('samedata', 'Data already exist!');
            return response()->json([
                        'status'=>400,
                        'errors'=>$order->errors()
                    ]);
        }


        // $validator = Validator::make($request->all(), [
        //     'signal' => 'required',
        //     'price' => 'required|max:12',
        //     'market' => 'required',
        //     'investment' => 'required|max:8',
        //     'duration' => 'required'
        // ]);

        // if($validator->fails())
        // {
        //     return response()->json([
        //         'status'=>400,
        //         'errors'=>$validator->errors()
        //     ]);
        // }
        // else
        // {
        //     $order = new Order;
        //     $order->signal = $request->input('signal');
        //     $order->price = $request->input('price');
        //     $order->market = $request->input('market');
        //     $order->investment = $request->input('investment');
        //     $order->duration = $request->input('duration');
        //     $order->save();
        //     return response()->json([
        //         'status'=>200,
        //         'message'=>'Order Added Successfully.'
        //     ]);
        // }

    }
}
