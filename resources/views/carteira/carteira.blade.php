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
  html: `<input type="number" id="valorDeposito" class="swal2-input" placeholder="R$ 0.00">`,
  confirmButtonText: 'Depositar',
  showCancelButton: true,
  cancelButtonText: 'Voltar',
  preConfirm: () => {
    const valorDeposito = Swal.getPopup().querySelector('#valorDeposito').value
    if (!valorDeposito) {
      Swal.showValidationMessage(`Valor é obrigatório`)
    }
    return { valorDeposito: valorDeposito }
  }
}).then((result) => {
  Swal.fire(`
    Login: ${result.value.login}
    Password: ${result.value.password}
  `.trim())
})
};
function modalTransferencia(){
  Swal.fire({
  title: 'Depósito',
  html: `<input type="number" id="valorDeposito" class="swal2-input" placeholder="R$ 0.00">`,
  confirmButtonText: 'Depositar',
  focusConfirm: false,
  preConfirm: () => {
    const valorDeposito = Swal.getPopup().querySelector('#valorDeposito').value
    console.log(valorDeposito);
    if (!valorDeposito) {
      Swal.showValidationMessage(`Valor é obrigatório`)
    }
    return { valorDeposito: valorDeposito }
  }
}).then((result) => {
  Swal.fire(`
    Login: ${result.value.login}
    Password: ${result.value.password}
  `.trim())
})
};
</script>
</head>
<x-app-layout>
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
    <label class="form-label" for="saldo">Saldo: </label>
    <input disabled value="{{ $carteira->saldo }}" type="number" name="saldo" class="form-control" />
  </div>
  <div class="row">
    <div class="col-sm-6 text-left">
      <div onclick="modalDeposito()" class="btn btn-primary btn-lg">Depositar</div>
      <button type="submit" class="btn btn-primary btn-lg btnTransferencia">Transferir</button>
      <button type="submit" class="btn btn-primary btn-lg btnTransferencia">Calcular Balanço</button>
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
        <div href="" class="btn btn-dark scrollBoxNewButtonDespesa"><span class="material-symbols-outlined">add</span></div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title ">Nome: Conta de águaAAAAAAAAAA</h3>
          <div class="summary cardText">
            Custo: R$300.00
          </div>
        </div>
        <div href="" class="btn btn-warning scrollBoxEditButton"><span class="material-symbols-outlined">edit</span></div>
        <div href="" class="btn btn-danger scrollBoxDeleteButton"><span class="material-symbols-outlined">delete</span></div>
      </div>
    </div>
  </div>  
  <div style="width: 400px; height: 500px; overflow-y:auto; overflow-x: hidden;" class=" card border border-dark rounded scrollBoxReceita box">
    <div class="card-header">
      <div class="row">
        <div class="headerText">Receita</div>
        <div href="" class="btn btn-dark scrollBoxNewButtonReceita"><span class="material-symbols-outlined">add</span></div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Nome: Trabalho</h3>
          <div class="summary cardText">
            Valor: R$3500.00
          </div>
        </div>
        <div href="" class="btn btn-warning scrollBoxEditButton"><span class="material-symbols-outlined">edit</span></div>
        <div href="" class="btn btn-danger scrollBoxDeleteButton"><span class="material-symbols-outlined">delete</span></div>
      </div>
    </div>
  </div>
  <div style="width: 400px; height: 500px; overflow-y:auto; overflow-x: hidden;" class=" card border border-dark rounded scrollBoxReceita box">
    <div class="card-header text-center">
      Transferências
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Recebido: R$400.00</h3>
          <div class="summary cardText">
            Remetente: Victor A Casagrande
          </div>
        </div>
      </div>
    </div>
    <div class="card cardCarteira">
      <div class="row">
        <div class="card_text">     
          <h3 class="title">Enviado:</h3>
          <div class="summary">
            Remetente:
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>               
</form>
 </div>

 </body>
</x-app-layout>