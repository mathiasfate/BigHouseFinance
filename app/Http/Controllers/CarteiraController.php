<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carteira;
use App\Models\Despesa;
use App\Models\Receita;
use App\Models\User;

class CarteiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carteiras = Carteira::all()->sortBy('id');
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
         $listaCarteiras = Carteira::all()->sortBy('id');
         $user = User::findOrFail($carteira->idUsuario);
         $despesas = Despesa::all()->where('idCarteira', $id);
         $receitas = Receita::all()->where('idCarteira', $id);
         return view('carteira.carteira', compact('carteira', 'despesas', 'receitas', 'user', 'listaCarteiras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carteira = Carteira::findOrFail($id);
        $carteira->saldo = $request->input('valor') + $carteira->saldo; 
        $carteira->save();
        return redirect()->route('carteira.index');
    }

    public function transfer(Request $request, string $id)
    {
        $carteira = Carteira::findOrFail($id);
        $carteira->saldo = $carteira->saldo - $request->input('valor'); 
        $carteira->save();
        return redirect()->route('carteira.index');
    }

    public function calculate(Request $request, string $id)
    {
        $valor = $request->input('valor');
        $carteira = Carteira::findOrFail($id);
        $carteira->saldo = $valor; 
        $carteira->save();
        return redirect()->route('carteira.index');
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
