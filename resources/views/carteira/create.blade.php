<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/carteira/create.css') }}">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    String.prototype.reverse = function(){
  return this.split('').reverse().join(''); 
};

function mascaraMoeda(campo,evento){
  var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
  var resultado  = "";
  var mascara = "##,###,###.##".reverse();
  for (var x=0, y=0; x<mascara.length && y<valor.length;) {
    if (mascara.charAt(x) != '#') {
      resultado += mascara.charAt(x);
      x++;
    } else {
      resultado += valor.charAt(y);
      y++;
      x++;
    }
  }
  campo.value = resultado.reverse();
}
</script>
<x-app-layout>
<body>
     <div class="container">
<form action="{{ route('carteira.store') }}" method="POST">
    @csrf
    <div class="form-outline mb-4">
      <label class="form-label" for="form6Example1">Nome: </label>
      <input type="text" id="form6Example1" class="form-control" value="{{$user->name}}" disabled/>
      <input type="hidden" id="nomeUsuario" name="nomeUsuario" class="form-control" value="{{$user->name}}"/>
    </div>
    <input type="hidden" name="idUsuario" class="form-control" value="{{$id}}"/>
  <div class="form-outline mb-4">
    <label class="form-label" for="saldo">Saldo inicial: </label>
    <input type="text" onKeyUp="mascaraMoeda(this, event)" name="saldo" class="form-control" required />
  </div>
  <div class="row">
    <div class="col-sm-12 text-left">
      <button type="submit" class="btn btn-primary btn-lg">Criar</button>
      <a href="{{ route('carteira.index') }}" class="btn btn-primary btn-lg btnVoltar">Voltar</a>
    </div>
  </div>
</form>
 </div>
 </body>
</x-app-layout>