<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $commissions = Commission::where('user_id', Auth::id())->get();
        $commissions = Auth::user()->commissions;
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
        $rules = [
            'title' => 'required|min:3|max:30',
            'type' => 'required',
            'info' => 'required|min:5|max:255',
            'tip' => 'max:100',
        ];
        $customMessages = [
            'title.required' => 'El campo de nombre no se admite vacío',
            'info.required' => 'Es necesario que agregues una descripción',
            // 'tip.value' => '¡Te lo agradezco mucho! pero no puedes ingresar más de 100 de propina',
        ];
        $validatedData = $request->validate($rules, $customMessages);

        //Validaciones para asignar los precios de cada tipo de comisión
        if($request->type == 'perfil'){
            $price = 10;
        }else if($request->type == 'busto'){
            $price = 15;
        }else if($request->type == 'medio'){
            $price = 20;
        }else if($request->type == 'full'){
            $price = 25;
        }else if($request->type == 'escena'){
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
        $rules = [
            'title' => 'required|min:3|max:30',
            'type' => 'required',
            'info' => 'required|min:5|max:255',
            'tip' => 'max:100',
        ];
        $customMessages = [
            'title.required' => 'El campo de nombre no se admite vacío',
            'info.required' => 'Es necesario que agregues una descripción',
            // 'tip.value' => '¡Te lo agradezco mucho! pero no puedes ingresar más de 100 de propina',
        ];
        $validatedData = $request->validate($rules, $customMessages);
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
        if($request->type == 'perfil'){
            $price = 10;
        }else if($request->type == 'busto'){
            $price = 15;
        }else if($request->type == 'medio'){
            $price = 20;
        }else if($request->type == 'full'){
            $price = 25;
        }else if($request->type == 'escena'){
            $price = 30;
        }

        //Si es con fines comerciales
        if($request->commercial == 1){
            $price += $price*0.5;
        }
        $commission->price = $price;

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
