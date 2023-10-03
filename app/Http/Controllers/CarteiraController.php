<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carteira;

class CarteiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carteiras = Carteira::all();
        return view('carteira.index', compact('carteiras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carteira.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carteira = new Carteira([
            'idUsuario' => $request->input('idUsuario'),
            'saldo' => $request->input('saldo')
        ]);

        $carteira->save();
        return redirect()->route('carteira.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $carteira = Carteira::findOrFail($id);
         return view('carteira.carteira', compact('carteira'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $carteira = Carteira::findOrFail($id);
         $carteira->delete();
         return redirect()->route('carteira.index');
    }
}
