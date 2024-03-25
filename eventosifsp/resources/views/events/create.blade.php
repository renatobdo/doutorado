@extends('layouts.main')

@section('title','Criar eventos')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Tela de Criação de eventos</h1>
    <form id="eventoForm" action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" 
                placeholder="Nome do evento">
        </div>
        <div class="form-group">
            <label for="date">Data do Evento:</label>
            <input type="date" class="form-control" id="date" name="date" 
                placeholder="Data do evento">
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
        </div>
        <div class="form-group">
            <label for="title">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
        </div>
        <div class="form-group">
            <label for="title">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
        </div>
        <div class="form-group">
            <label for="title">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição do evento:</label>
            <textarea id="description" name="description" class="form-control" placeholder="Descrição do evento"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="title">Adicione eventos de infraestrutura</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco">Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja">Cerveja grátis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open food">Open food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="brindes">Brindes
            </div>
        </div>
        <input type="submit" class="btn btn-primary" name="criar_evento" value="criar evento">

        <br><br>

    </form>
   </div>

   <script>
    const cepInput = document.getElementById('cep');
    const enderecoInput = document.getElementById('endereco');

    cepInput.addEventListener('change', function() {
        const cep = cepInput.value;

        fetch(`/buscarCep/${cep}`)
            .then(response => response.json())
            .then(data => {
                enderecoInput.value = data.logradouro + ', ' + data.bairro + ', '
                     + data.localidade + ' - ' + data.uf;
            })
            .catch(error => {
                console.error('Erro ao buscar CEP:', error);
            });
    });
</script>

@endsection