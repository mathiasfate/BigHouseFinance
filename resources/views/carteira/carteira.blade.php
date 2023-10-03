<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<body>
     <div class="container">
<form action="{{ route('carteira.store') }}" method="POST">
    @csrf
    <div class="form-outline mb-4">
      <label class="form-label" for="form6Example1">Nome: </label>
      <input disabled value="{{ $carteira->idUsuario }}" type="text" id="form6Example1" class="form-control" />
    </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="idUsuario">Id do usuário: </label>
    <input disabled value="{{ $carteira->idUsuario }}" type="number" name="idUsuario" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="saldo">Saldo inicial: </label>
    <input disabled value="{{ $carteira->saldo }}" type="number" name="saldo" class="form-control" />
  </div>
  <div class="row">
    <button type="submit" class="btn btn-primary btn-block mb-4">Depositar</button>
    <button type="submit" class="btn btn-primary btn-block mb-4">Transferir</button>
  </div>
  <a href="{{ route('carteira.index') }}" class="btn btn-primary btn-block mb-4">Voltar</a>
</form>
 </div>
 </body>