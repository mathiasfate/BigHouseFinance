<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;

class DespesaController extends Controller
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
        $messages = [
            'valor.required' => 'É necessário preencher o valor.',
            'nome.required' => 'É necessário preencher o nome.',
            'valor.max' => 'O campo valor não pode ser superior a 9,999.99'
        ];
        $request->validate([
            'valor' => 'required|string|max:8',
            'nome' => 'required|string|max:24',
        ],$messages);
        $despesa = new Despesa([
            'idCarteira' => $request->input('idCarteira'),
            'nome' => $request->input('nome'),
            'valor' => floatval(str_replace(',', '.', str_replace(',', '', $request->input('valor'))))
        ]);

        $despesa->save();
        return redirect()->route('carteira.show', $request->input('idCarteira'))->with('success', 'Despesa cadastrada com sucesso!');
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
        $despesa = Despesa::findOrFail($id);
        $despesa->delete();
        return redirect()->route('carteira.show', $despesa->idCarteira)->with('success', 'Despesa excluída com sucesso!');;
    }
}
