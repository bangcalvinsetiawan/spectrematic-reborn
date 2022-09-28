<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return dd(User::where('id', auth()->user()->id)->first()->token);
        return view('dashboard.token', [
            'title' => 'Token',
            'user' => User::where('id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    //  versi 1
    // public function edit(User $user)
    // {
    //     return view('dashboard.edittoken', [
    //         'title' => 'Update Token',
    //         'user' => User::where('id', auth()->user()->id)->first()
    //     ]);
    // }

    // versi 2
    public function edit($id)
    {
        // $user = User::findOrFail($id); //ini bisa juga, tapi semua tidak auth
        $user = User::findOrFail(auth()->user()->id);

        return view('dashboard.edittoken', [
            'title' => 'Update Token',
            'user' => $user
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $user = User::findOrFail($id);
        // return dd($user);
        // $user->update($request->all());

        $post = User::find($id)->update($request->all());
        return redirect()->route('dashboard');
        // User::where('id',$id)->first()->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
