<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $receita = new Receita([
            'idCarteira' => $request->input('idCarteira'),
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor')
        ]);

        $receita->save();
        return redirect()->route('carteira.show', $request->input('idCarteira'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $receita = Receita::findOrFail($id);
        $receita->delete();
        return redirect()->route('carteira.show', $receita->idCarteira);
    }
}
