<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return Order::where('user_id', auth()->user()->id)->get();
        // ini sudah ok dibawah ini
        return view('dashboard.orders.order', [
            'title' => 'Order',
            'orders' => Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.orders.create', [
            'title' => 'Place Order'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
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
            // new user
            return redirect('/order')
            ->with('success', 'New order has been placed!');
        } else {
            // user already exists
            return redirect('/order')
            ->with('samedata', 'Data already exist!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $order = Order::find($id);
        // dd($order);
        return view('dashboard.orders.edit', compact('order'), [
            'title' => 'Edit Order',
            // 'order' => Order::where('user_id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'signal' => 'required',
            'price' => 'required|max:12',
            'market' => 'required',
            'investment' => 'required|max:8',
            'duration' => 'required'
        ];
        $validatedData = $request->validate($rules);

        // $validatedData['user_id'] = auth()->user()->id;

        Order::find($id)
            ->update($validatedData);

        return redirect('/order')
            ->with('success', 'Order has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
        return redirect('/order')
            ->with('success', 'Order has been deleted!');


    }
}
