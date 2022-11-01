<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissions = Commission::all();
        return view('commissions.commissionsIndex', compact('commissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commissions.commissionsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'type' => 'required',
            'info' => 'required|max:255',
            'price' => 'required|min:1',
        ]);

        Commission::create($request->all());
        
        return redirect('/commission');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        return view('commissions.commissionsShow', compact('commission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        return view('commissions.commissionsEdit', compact('commission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commission $commission)
    {
        $request->validate([
            'title' => 'required|max:100',
            'type' => 'required',
            'info' => 'required|max:255',
            'price' => 'required|min:1',
        ]);
        
        // $commission = new Commission();
        $commission->title = $request->title;
        $commission->type = $request->type;
        $commission->info = $request->info;
        $commission->price = $request->price;
        if($request->commercial == null){
            $commission->commercial = 0;
        }else{
            $commission->commercial = $request->commercial;
        }
        $commission->save();

        // Commission:where('id', $commission->id)->update($request->all());

        return redirect('/commission');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        $commission->destroy($commission->id);
        return redirect('/commission');
    }
}
