@extends('layouts.main')

@section('title','Editar eventos: '.$event->titulo)

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$event->titulo}}</h1>
    <form id="eventoForm" action="/events/update/{{$event->id}}" method="POST" 
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="/img/events/{{$event->image}}" alt="{{$event->titulo}}" 
            class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" 
                placeholder="Nome do evento" value="{{$event->titulo}}">
        </div>
        <div class="form-group">
            <label for="date">Data do Evento:</label>
            <input type="date" class="form-control" id="date" name="date" 
                    value="{{ date('Y-m-d',strtotime($event->date)); }}">
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" 
            placeholder="Local do evento" value="{{$event->cidade}}">
        </div>
        <div class="form-group">
            <label for="title">O evento é privado?</label>
            <select name="privado" id="privado" class="form-control">
                <option value="0">Não</option>
                <option value="1" 
                {{$event->private == 1 ? "selected='selected'": ""}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição do evento:</label>
            <textarea id="descricao" name="descricao" class="form-control" 
            placeholder="Descrição do evento">{{$event->descricao}}</textarea>
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
        <input type="submit" class="btn btn-primary" 
        value="editar evento">

        <br><br>

    </form>
   </div>



@endsection