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
  html: ` <form action="{{ route('carteira.update', $carteira->id, 0, 0) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="func" id="func" value="1" hide>
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
        <form action="{{ route('carteira.update', $carteira->id  , 0 ,0) }}" method="POST">
          @csrf
          @method('PUT')
          <label for="carteiras">Carteira destino: </label>
          <select name="carteiras" id="carteiras">
          @foreach ($listaCarteiras as $carteiraDestino)
              <option value="{{$carteiraDestino->id}}">{{$carteiraDestino->id}}</option>
          @endforeach  
          </select>
          <input type="hidden" name="func" id="func" value="2" hide>
          <input type="number" id="valor" name="valor" class="swal2-input" placeholder="R$ 0.00"><br><br>
          <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
        </form>`,
  showConfirmButton: false,
  preConfirm: () => {
    const valorTransferencia = Swal.getPopup().querySelector('#valor').value
    if (!valorTransferencia) {
      Swal.showValidationMessage(`Valor é obrigatório`)
    }
    return { valor: valor }
  }
}).then((result) => {
})
};

function modalBalanco(){

  var arrDespesas = document.getElementsByName('valorDespesa');
    var totalDespesas = 0;
    for(var i=0;i<arrDespesas.length;i++){
        if(parseFloat(arrDespesas[i].innerHTML)){
          totalDespesas += parseFloat(arrDespesas[i].innerHTML);
            console.log(parseFloat(arrDespesas[i].innerHTML));
        }}

    var arrReceitas = document.getElementsByName('valorReceita');
    var totalReceitas = 0;
    for(var i=0;i<arrReceitas.length;i++){
        if(parseFloat(arrReceitas[i].innerHTML)){
          totalReceitas += parseFloat(arrReceitas[i].innerHTML);
            console.log(parseFloat(arrReceitas[i].innerHTML));
        }      
    }
    var saldo = document.getElementById('saldoCarteira').value;
    var saldoFinal = saldo - totalDespesas + totalReceitas;
  Swal.fire({
  title: 'Calcular balanço',
  html: ` <form action="{{ route('carteira.update', $carteira->id  ) }}" method="POST">
          @csrf
          @method('PUT')
          <label for="valor">Saldo final:</label>
          <input name="valor" id="valor" type="number" class="swal2-input" value="${saldoFinal}" disabled>
          <input type="hidden" name="func" id="func" value="3">
          <label for="totalDespesas">Total de despesas:</label>
          <input type="number" name="totalDespesas" class="swal2-input" id="totalDespesas" value="${totalDespesas}" readonly>
          <label for="totalReceitas">Total de receitas:</label>
          <input type="number" name="totalReceitas" class="swal2-input" id="totalReceitas" value="${totalReceitas}" readonly><br><br>
          <button type="submit" class="btn btn-primary btn-lg">Calcular</button>
          </form>
          `,
  showConfirmButton: false,
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

function modalExclusao(){
  Swal.fire({
  title: 'Excluir carteira',
  html: `<form action="{{ route('carteira.destroy', $carteira->id) }}" method="POST">
          <label for="nome">Você tem certeza que deseja excluir esta carteira?</label><br><br>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-primary btn-lg">Excluir</button>
          </form>`,
  showConfirmButton: false,
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
    <input disabled value="{{ $carteira->saldo }}" type="number" name="saldo" id="saldoCarteira" class="form-control" />
  </div>
  <div class="row">
    <div class="col-sm-8 text-left">
      <div onclick="modalDeposito()" class="btn btn-primary btn-lg">Depositar</div>
      <div onclick="modalTransferencia()" class="btn btn-primary btn-lg btnTransferencia">Transferir</div>
      <div onclick="modalBalanco()" class="btn btn-primary btn-lg btnTransferencia">Calcular Balanço</div>
    </div>
    <div class="col-sm-3 text-right">
      <a onclick="modalExclusao()" class="btn btn-primary btn-lg btnVoltar">Excluir</a>
    </div>
    <div class="col-sm-1 text-right">
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
          <div class="row">
          <div class="summary cardText valorDespesa">
            Custo: R$
          </div>
          <div name="valorDespesa" class="summary cardNumber">
            {{$despesa->valor}}
          </div>
          </div>
        </div>
        <form action="{{ route('despesa.destroy', $despesa->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="idCarteira" id="idCarteira" value="{{$carteira->id}}">
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
          <div class="row">
          <div class="summary cardText">
            Valor: R$
          </div>
          <div name="valorReceita" class="summary cardNumber">
            {{$receita->valor}}
          </div>
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
    @foreach ($transferencias as $transferencia)      
      <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <div class="row">
          <h3 class="title titleText">{{ $carteira->id == $transferencia->idRemetente ? 'Destinatário: '.$transferencia->idDestinatario : 'Remetente: '.$transferencia->idRemetente}}</h3>
          <div class="dataText">Data: {{$transferencia->dataTransferencia}}</div>
          </div>
          <div class="row">
          <div class="summary cardTextTransfer">
          {{ $carteira->id == $transferencia->idRemetente ? 'Valor enviado: R$' : 'Valor recebido: R$'}}
          </div>
          <div name="valorReceita" class="summary cardNumberTransfer">
            {{$transferencia->valor}}
          </div>
          </div>
        </div>
      </div>
    </div> 
    @endforeach
  </div>
  </div>               
 </div>
 </body>
</x-app-layout>