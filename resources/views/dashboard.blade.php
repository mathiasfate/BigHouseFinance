<x-app-layout>
<link rel="stylesheet" href="{{ asset('css/carteira/index.css') }}">
<body>
<div class="container">
        {{-- <h1>Lista de Usuários</h1> --}}
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="colunas">{{ $user->id }}</td>
                        <td id="nome">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->admin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>  
</x-app-layout>