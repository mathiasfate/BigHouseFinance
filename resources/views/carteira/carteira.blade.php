<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 200,
  'GRAD' 200,
  'opsz' 48
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/carteira/carteira.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
function modalDeposito(){
  Swal.fire({
  title: 'Depósito',
  html: ` <form action="{{ route('carteira.update', $carteira->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="number" name="valor" id="valor" class="swal2-input" placeholder="R$ 0.00"><br><br>
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
          </form>`,
  showConfirmButton: false,
  preConfirm: () => {
    const valorDeposito = Swal.getPopup().querySelector('#valor').value
    if (!valorDeposito) {
      Swal.showValidationMessage(`Valor é obrigatório`)
    }
    return { valorDeposito: valorDeposito }
  }
}).then((result) => {
})
};

function modalTransferencia(){
  Swal.fire({
  title: 'Transferência',
  html: `
          <label for="carteiras">Carteira destino: </label>
          <select name="carteiras" id="carteiras">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select><br><br>
          <input type="number" id="valorTransferencia" class="swal2-input" placeholder="R$ 0.00">`,
  confirmButtonText: 'Transferir',
  showCancelButton: true,
  cancelButtonText: 'Voltar',
  focusConfirm: false,
  preConfirm: () => {
    const valorTransferencia = Swal.getPopup().querySelector('#valorTransferencia').value
    if (!valorTransferencia) {
      Swal.showValidationMessage(`Valor é obrigatório`)
    }
    return { valorTransferencia: valorTransferencia }
  }
}).then((result) => {
})
};

function modalBalanco(){
  Swal.fire({
  title: 'Calcular balanço',
  html: ` <label for="valorFinal">Saldo final:</label>
          <input name="valorFinal" id="valorFinal" type="number" id="valorBalanço" class="swal2-input" placeholder="R$ 0.00" disabled>`,
  confirmButtonText: 'Efetuar',
  showCancelButton: true,
  cancelButtonText: 'Voltar',
  focusConfirm: false,
  preConfirm: () => {
  }
}).then((result) => {
})
};

function modalDespesas(){
  Swal.fire({
  title: 'Despesas',
  html: `<form action="{{ route('despesa.store') }}" method="POST">
          @csrf
          <input type="hidden" name="idCarteira" id="idCarteira" value="{{$carteira->id}}" hide>
          <label for="nome">Nome: </label>
          <input name="nome" type="text" id="nome" class="swal2-input">
          <br>
          <label for="valor">Valor: </label>
          <input name="valor" type="number" id="valor" class="swal2-input" placeholder="R$ 0.00"><br><br>
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
          </form>`,
  showConfirmButton: false,
  focusConfirm: false,
  preConfirm: () => {
    const valorDespesa = Swal.getPopup().querySelector('#valor').value
    const nomeDespesa = Swal.getPopup().querySelector('#nome').value
    if (!valorDespesa) {
      Swal.showValidationMessage(`Valor é obrigatório`)
    }
    if (!nomeDespesa) {
      Swal.showValidationMessage(`Nome é obrigatório`)
    }
    return { valorDespesa: valorDespesa }
  }
}).then((result) => {
})
};

function modalReceitas(){
  Swal.fire({
  title: 'Receitas',
  html: `<form action="{{ route('receita.store') }}" method="POST">
          @csrf
          <input type="hidden" name="idCarteira" id="idCarteira" value="{{$carteira->id}}" hide>
          <label for="nome">Nome: </label>
          <input name="nome" type="text" id="nome" class="swal2-input">
          <br>
          <label for="valor">Valor: </label>
          <input name="valor" type="number" id="valor" class="swal2-input" placeholder="R$ 0.00"><br><br>
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
          </form>`,
  showConfirmButton: false,
  focusConfirm: false,
  preConfirm: () => {
    const valorDespesa = Swal.getPopup().querySelector('#valor').value
    const nomeDespesa = Swal.getPopup().querySelector('#nome').value
    if (!valorDespesa) {
      Swal.showValidationMessage(`Valor é obrigatório`)
    }
    if (!nomeDespesa) {
      Swal.showValidationMessage(`Nome é obrigatório`)
    }
    return { valorReceita: valorReceita }
  }
}).then((result) => {
})
};

</script>
</head>
<x-app-layout>
<body>
<div class="container">
    <div class="form-outline mb-4">
      <label class="form-label" for="form6Example1">Nome: </label>
      <input disabled value="{{$user->name}}" type="text" id="form6Example1" class="form-control" />
    </div>
  <div class="form-outline mb-4">
    <input disabled value="{{ $carteira->idUsuario }}" type="hidden" name="idUsuario" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="saldo">Saldo: </label>
    <input disabled value="{{ $carteira->saldo }}" type="number" name="saldo" class="form-control" />
  </div>
  <div class="row">
    <div class="col-sm-6 text-left">
      <div onclick="modalDeposito()" class="btn btn-primary btn-lg">Depositar</div>
      <div onclick="modalTransferencia()" class="btn btn-primary btn-lg btnTransferencia">Transferir</div>
      <div onclick="modalBalanco()" class="btn btn-primary btn-lg btnTransferencia">Calcular Balanço</div>
    </div>
    <div class="col-sm-6 text-right">
      <a href="{{ route('carteira.index') }}" class="btn btn-primary btn-lg btnVoltar">Voltar</a>
    </div>
  </div>
  <div class="row">
  <div style="width: 400px; height: 500px; overflow-y:auto; overflow-x: hidden;" class=" card border border-dark rounded scrollBoxDespesa box">
    <div class="card-header">
    <div class="row">
        <div class="headerText">Despesas</div>
        <div onclick="modalDespesas()" class="btn btn-dark scrollBoxNewButtonDespesa"><span class="material-symbols-outlined">add</span></div>
      </div>
    </div>
    @foreach ($despesas as $despesa)
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title ">Nome: {{$despesa->nome}}</h3>
          <div class="summary cardText">
            Custo: R${{$despesa->valor}}
          </div>
        </div>
        <form action="{{ route('despesa.destroy', $despesa->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger scrollBoxDeleteButton"><span class="material-symbols-outlined">delete</span></button>
        </form>
      </div>
    </div>
    @endforeach
  </div>  
  <div style="width: 400px; height: 500px; overflow-y:auto; overflow-x: hidden;" class=" card border border-dark rounded scrollBoxReceita box">
    <div class="card-header">
      <div class="row">
        <div class="headerText">Receita</div>
        <div onclick="modalReceitas()" class="btn btn-dark scrollBoxNewButtonReceita"><span class="material-symbols-outlined">add</span></div>
      </div>
    </div>
    @foreach ($receitas as $receita)
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Nome: {{$receita->nome}}</h3>
          <div class="summary cardText">
            Valor: R${{$receita->valor}}
          </div>
        </div>
        <form action="{{ route('receita.destroy', $receita->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger scrollBoxDeleteButton"><span class="material-symbols-outlined">delete</span></button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
  <div style="width: 400px; height: 500px; overflow-y:auto; overflow-x: hidden;" class=" card border border-dark rounded scrollBoxReceita box">
    <div class="card-header text-center">
      Transferências
    </div>
  </div>
  </div>               
 </div>
 </body>
</x-app-layout>