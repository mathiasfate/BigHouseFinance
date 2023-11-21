<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Carteira;
use App\Models\Despesa;
use App\Models\Receita;
use App\Models\Transferencia;
use App\Models\User;

class CarteiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        $id = Auth::id();
        if($user->admin == "adminKey"){
            $carteiras = Carteira::all()->sortBy('id');
            return view('carteira.index', compact('carteiras')); 
        }
        $carteiras = Carteira::all()->where('idUsuario', $id)->sortBy('id');
        return view('carteira.index', compact('carteiras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $id = Auth::id();
        return view('carteira.create', compact('id', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'saldo.required' => 'É necessário preencher o saldo.'
        ];

        $request->validate([
            'saldo' => 'required|string|max:16',
        ],$messages);

        $carteira = new Carteira([
            'idUsuario' => $request->input('idUsuario'),
            'nomeUsuario' => $request->input('nomeUsuario'),
            'saldo' => floatval(str_replace(',', '.', str_replace(',', '', $request->input('saldo'))))
        ]);

        $carteira->save();
        return redirect()->route('carteira.show', $carteira->id)->with('success', 'Carteira criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $carteira = Carteira::findOrFail($id);
         $listaCarteiras = Carteira::all()->where('id', '!=' , $id)->sortBy('id');
         $user = User::findOrFail($carteira->idUsuario);
         $despesas = Despesa::all()->where('idCarteira', $id);
         $receitas = Receita::all()->where('idCarteira', $id);
         $transferencias = Transferencia::where('idRemetente', $carteira->id)->orWhere('idDestinatario', $carteira->id)->orderBy('dataTransferencia', 'desc')->get();
         return view('carteira.carteira', compact('carteira', 'despesas', 'receitas', 'user', 'listaCarteiras', 'transferencias'));
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
        $messages = [
            'valor.required' => 'É necessário preencher o valor.',
            'carteiras.required' => 'É necessário preencher o destinatário.',
            'valor.max' => 'O campo valor não pode ser superior a 99,999.99'
        ];

        //deposito
        if($request->input('func') == 1){
            $request->validate([
                'valor' => 'required|string|max:9',
            ],$messages);
            $carteira = Carteira::findOrFail($id);
            $carteira->saldo = floatval(str_replace(',', '.', str_replace(',', '', $request->input('valor')))) + $carteira->saldo; 
            $carteira->save();
            return redirect()->route('carteira.show', $id)->with('success', 'Depósito realizado com sucesso!');
        }
        //transferencia
        if($request->input('func') == 2){
            $carteira = Carteira::findOrFail($id);
            if($carteira->saldo < floatval(str_replace(',', '.', str_replace(',', '', $request->input('valor'))))){
                return redirect()->route('carteira.show', $id)->withErrors("Saldo insuficiente!");
            }
            $request->validate([
                'valor' => 'required|string|max:9',
            ],$messages);
            $carteira->saldo = $carteira->saldo - floatval(str_replace(',', '.', str_replace(',', '', $request->input('valor')))); 
            $carteira->save();
            $carteiraDestino = Carteira::findOrFail($request->input('carteiras'));
            $carteiraDestino->saldo = $carteiraDestino->saldo + floatval(str_replace('.', ',', str_replace(',', '', $request->input('valor'))));
            $carteiraDestino->save();
            $transferencia = new Transferencia([
                'idRemetente' => $id,
                'idDestinatario' => $request->input('carteiras'),
                'dataTransferencia' => date('d/m/Y h:i:s a', time()),
                'valor' => floatval(str_replace(',', '.', str_replace(',', '', $request->input('valor'))))

            ]);
            $transferencia->save();
            return redirect()->route('carteira.show', $id)->with('success', 'Transferencia realizada com sucesso!');
        }
        //calcular balanco
        if($request->input('func') == 3){
            $carteira = Carteira::findOrFail($id);
            $saldoFinal = $carteira->saldo - $request->input('totalDespesas');
            $saldoFinal = $saldoFinal + $request->input('totalReceitas');
            if($saldoFinal < 0){
                return redirect()->route('carteira.show', $id)->withErrors("Saldo insuficiente!");
            }
            $carteira->saldo = $saldoFinal;
            $carteira->save();
            return redirect()->route('carteira.show', $id)->with('success', 'Balanço calculado com sucesso!');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $carteira = Carteira::findOrFail($id);
         $carteira->delete();
         return redirect()->route('carteira.index')->with('success', 'Carteira excluída com sucesso!');;
    }
}
