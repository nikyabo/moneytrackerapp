<?php

namespace App\Http\Controllers;
use App\Models\Moneytrackerapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

use function PHPSTORM_META\map;

class MoneytrackerappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $moneytrackerapps= Moneytrackerapp::all()->sortByDesc('created_at');
        $sumofexpenses = Moneytrackerapp::all()->sum('amount');
        $sumofgas = Moneytrackerapp::where('category','=','1')->sum('amount');
        $sumoffood = Moneytrackerapp::where('category','=','2')->sum('amount');
        $sumofbills = Moneytrackerapp::where('category','=','3')->sum('amount');
        $sumofgroceries = Moneytrackerapp::where('category','=','4')->sum('amount');
        return view('index',compact('moneytrackerapps','sumofexpenses','sumofgas','sumoffood','sumofbills','sumofgroceries'));
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

        $data = $request->validate([
            'amount'=>'required',
            'category'=>'required',
            'content'=>'required',
            'categorystring'=>'required',
        ]);
        Moneytrackerapp::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moneytrackerapp  $moneytrackerapp
     * @return \Illuminate\Http\Response
     */
    public function show(Moneytrackerapp $moneytrackerapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moneytrackerapp  $moneytrackerapp
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneytrackerapp $moneytrackerapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moneytrackerapp  $moneytrackerapp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moneytrackerapp $moneytrackerapp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moneytrackerapp  $moneytrackerapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneytrackerapp $moneytrackerapp)
    {
        //
        $moneytrackerapp->delete();
        return back();
    }
}