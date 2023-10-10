<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/carteira/carteira.css') }}">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<x-app-layout>
<body>
     <div class="container">
<form action="{{ route('carteira.store') }}" method="POST">
    @csrf
    <div class="row">
    <div class="col-sm-12 text-right">
      <button type="submit" class="btn btn-primary ">Despesas</button>
      <button type="submit" class="btn btn-primary  btnTransferencia">Receitas</button>
    </div>
  </div>
    <div class="form-outline mb-4">
      <label class="form-label" for="form6Example1">Nome: </label>
      <input disabled value="{{ $carteira->idUsuario }}" type="text" id="form6Example1" class="form-control" />
    </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="idUsuario">Id do usuário: </label>
    <input disabled value="{{ $carteira->idUsuario }}" type="number" name="idUsuario" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="saldo">Saldo: </label>
    <input disabled value="{{ $carteira->saldo }}" type="number" name="saldo" class="form-control" />
  </div>
  <div class="row">
    <div class="col-sm-6 text-left">
      <button type="submit" class="btn btn-primary btn-lg">Depositar</button>
      <button type="submit" class="btn btn-primary btn-lg btnTransferencia">Transferir</button>
      <button type="submit" class="btn btn-primary btn-lg btnTransferencia">Calcular Balanço</button>
    </div>
    <div class="col-sm-6 text-right">
      <a href="{{ route('carteira.index') }}" class="btn btn-primary btn-lg btnVoltar">Voltar</a>
    </div>
  </div>
</form>
 </div>
 </body>
</x-app-layout>