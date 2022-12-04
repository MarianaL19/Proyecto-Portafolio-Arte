<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $commissions = Commission::all();
        
        //Solo mostrar las comisiones propias del usuario Logeado
        // $commissions = Commission::where('user_id', Auth::id())->get());

        if(Auth::user()->rol == "admin"){
            //Se realiza la consulta con with para minimizar el problema de N+1 consultas
            $commissions = Commission::with('user')->get();
        }else{
            $commissions = Auth::user()->commissions;
            // $commissions = Auth::user()::with('commissions')->get();
        }
        
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
            'title' => 'required|min:3|max:30',
            'type' => 'required',
            'info' => 'required|min:5|max:255',
            // 'tip' => 'digits_between:0,100|numeric',
            'price' => 'numeric',
            'commercial' => 'digits_between:0,1|numeric',
        ]);

        //Validaciones para asignar los precios de cada tipo de comisión
        if($request->type == 'Perfil'){
            $price = 10;
        }else if($request->type == 'Busto'){
            $price = 15;
        }else if($request->type == 'Medio cuerpo'){
            $price = 20;
        }else if($request->type == 'Cuerpo completo'){
            $price = 25;
        }else if($request->type == 'Escena'){
            $price = 30;
        }

        //Si es con fines comerciales
        if($request->commercial == 1){
            $price += $price*0.5;
        }

        $request->merge(['price' => $price]);
        //Aunque no reciba el id por el formulario, se lo asignamos con "merge"
        $request->merge(['user_id' => Auth::id()]);

        Commission::create($request->all());
        
        return redirect('/commission')->with('success','¡Comisión creada exitosamente! :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        //Validamos si es el mismo usuario el que quiere editar su comisión
        if (! Gate::allows('ver-edita-comision', $commission)){
            abort(403);
        }
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
        //Validamos si es el mismo usuario el que quiere editar su comisión
        if (! Gate::allows('ver-edita-comision', $commission)){
            abort(403);
        }
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
            'title' => 'required|min:3|max:30',
            'type' => 'required',
            'info' => 'required|min:5|max:255',
            // 'tip' => 'digits_between:0,100|numeric',
            'price' => 'numeric',
            'commercial' => 'digits_between:0,1|numeric',
        ]);
        
        // $commission = new Commission();
        $commission->title = $request->title;
        $commission->type = $request->type;
        $commission->info = $request->info;
        $commission->tip = $request->tip;
        if($request->commercial == null){
            $commission->commercial = 0;
        }else{
            $commission->commercial = $request->commercial;
        }

        //Validaciones para asignar los precios de cada tipo de comisión
        if($request->type == 'Perfil'){
            $price = 10;
        }else if($request->type == 'Busto'){
            $price = 15;
        }else if($request->type == 'Medio cuerpo'){
            $price = 20;
        }else if($request->type == 'Cuerpo completo'){
            $price = 25;
        }else if($request->type == 'Escena'){
            $price = 30;
        }

        //Si es con fines comerciales
        if($request->commercial == 1){
            $price += $price*0.5;
        }
        $commission->price = $price;

        $commission->save();

        // Commission:where('id', $commission->id)->update($request->all());

        return redirect('/commission')->with('success','La comisión se ha actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        //Validamos si es el mismo usuario el que quiere ELIMINAR su comisión
        if (! Gate::allows('ver-edita-comision', $commission)){
            abort(403);
        }
        $commission->destroy($commission->id);
        return redirect('/commission')->with('delete','Se ha eliminado la comisión.');
    }
}
