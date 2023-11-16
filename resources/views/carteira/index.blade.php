<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/carteira/index.css') }}">
<body>
<div class="container">
        {{-- <h1>Lista de Carteiras</h1> --}}
        <br>
        <div class="col-sm-12 text-right">
            <a href="{{ route('carteira.create') }}" class="btn btn-primary">Nova Carteira</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proprietário</th>
                    <th>Saldo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carteiras as $carteira)
                    <tr>
                        <td class="colunas">{{ $carteira->id }}</td>
                        <td id="nome">{{ $carteira->nomeUsuario }}</td>
                        <td>{{ $carteira->saldo }}</td>
                        <td>
                            <a href="{{ route('carteira.show', $carteira->id) }}" class="btn btn-warning">Acessar</a>
                            <form action="{{ route('carteira.destroy', $carteira->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>  
</x-app-layout>