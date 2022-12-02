<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //Middelware para que se permita mostrar el index y la vista individual de los productos
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        // $products = Product::with('users')->get();
        $products = Product::all();

        return view('products.productsIndex', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.productsCreate');
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
            'price' => 'required|numeric',
            'info' => 'required|min:5|max:255',
            'author' => 'required|min:3|max:30',
            'technique' => 'required|min:3|max:30',
            'format' => 'required|min:3|max:30',
            'img' => 'max:255',
        ]);

        // $request->merge(['user_id' => Auth::id()]);

        Product::create($request->all());

        return redirect('/product')->with('success','¡Producto creado exitosamente! :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.productsShow', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //Validamos si es el administrador el que quiere editar un producto
        if (! Gate::allows('edita-producto')){
            abort(403);
        }
        return view('products.productsEdit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|min:3|max:30',
            'price' => 'required|numeric',
            'info' => 'required|min:5|max:255',
            'author' => 'required|min:3|max:30',
            'technique' => 'required|min:3|max:30',
            'format' => 'required|min:3|max:30',
            'img' => 'max:255',
        ]);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->info = $request->info;
        $product->author = $request->author;
        $product->technique = $request->technique;
        $product->format = $request->format;
        $product->img = $request->img;

        $product->save();
        return redirect('/product')->with('success','El producto se ha editado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    // Método para eliminar un producto
    public function destroy(Product $product)
    {
        //Validamos si es el administrador el que quiere eliminar un producto
        if (! Gate::allows('edita-producto')){
            abort(403);
        }

        $product->destroy($product->id);
        return redirect('/product')->with('delete','Se ha eliminado el producto.');
    }


    // * * * * Funciones para la PAPELERA * * * *

    //Métdoo para MOSTRAR la papelera de productos
    public function trash()
    {
        $products = Product::onlyTrashed()->get();

        return view('products.productsTrash', compact('products'));
    }  

    //Función para VACIAR la papelera de productos
    public function forcedelete($id)
    {
        $products = Product::withTrashed()->find($id);
        $products->forceDelete();

        return redirect('/products/trash')->with('delete','Se ha eliminado DEFINITIVAMENTE el producto.');
    }

    //Función para RECUPERAR los elementos en la papelera
    public function restore($id)
    {
        $products = Product::withTrashed()->find($id);
        $products->restore();

        return redirect('/products/trash')->with('success','El producto se ha restaurado con éxito. ;)');
    }


    // * * * * Funciones de la tabla user_product | FAVORITOS * * * *

    // Función para RELACIONAR un producto a los favoritos de un usuario
    public function favorite(Request $request, Product $product)
    {
        $user_id = Auth::id();
        $producto = Product::find($request->id_product);
        // dd($producto);
        $producto->users()->attach($user_id);
        return redirect('/product');
    }

    // Función para ELIMINAR un producto de los favoritos
    public function deleteFavorite(Request $request)
    {
        $user_id = Auth::id();
        $producto = Product::find($request->id_product);
        $producto->users()->detach($user_id);
        return redirect('/favorite');
    }

    // Función para MOSTRAR los productos favoritos de un usuario
    public function showFavorites()
    {
        if (! Gate::allows('ver-favoritos')){
            abort(403);
        }

        $products = Auth::user()->products;
        $products = $products->unique('title');
        // dd($products);

        return view('favorites.favorites', compact('products'));
    }
}
