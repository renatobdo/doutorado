@extends('layouts.main')

@section('title', 'Página de Eventos')

@section('content')

<!--<div id="search-container" class="col-md-12">
<h1>Pesquise por dengue</h1>
    <form action="/" method="GET">
        <div>
        </div>
        <input type="text" id="search" name="search" class="form-control" placeholder="Na sua rua">
        <br><input type="text" id="search2" name="search" class="form-control" placeholder="No seu bairro"><br>
        <input type="text" id="search3" name="search" class="form-control" placeholder="Na sua cidade">
    </form>
</div> !-->
<div id="search-container" class="col-md-12">
    <h1>Pesquise por dengue</h1>
    <table>
        <tr>
            <td><img src="/img/UspContraADengue.png" alt="Imagem" width="150" height="150"></td>
            <td>
                <form action="/" method="GET">
                    <input type="text" id="search" name="search" class="form-control large-input" placeholder="Nome da rua ou CEP"><br>
                    <input type="text" id="search2" name="search" class="form-control large-input" placeholder="Nome da cidade"><br>
                    
                    <div class="text-center"> <!-- Div para centralizar o botão -->
                        <input type="submit" id="pesquisar" class="btn btn-primary">
                    </div>
                </form>
                
            </td>
        </tr>
    </table>
    <div id="search-result-dengue"></div> <!-- Elemento para exibir o resultado da pesquisa -->
    <div id="search-result-dengue2"></div> <!-- Elemento para exibir o resultado da pesquisa -->
</div>

<div id="focos-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2>Focos no seu bairro</h2>
    <p class="subtitle">Vejam os focos da dengue mais recentes idenficados pelos cidadãos <span class="highlight">no seu bairro</span></p>
    @endif
    
    <div class="container">
        <div class="row">
      
            @foreach($events as $event)
        <div class="card custom-card col-md-3 col-sm-12 mx-3 my-3">
            
            <img src="/img/events/{{$event->image}}" alt="{{$event->titulo}}">

            <div class="card-body">
                <p class="card-date">{{date('d/m/Y',strtotime($event->date))}}</p>
                <h5 div class="card-title">
                    {{$event->titulo}}
                </h5>
                <p class="card-participants">{{count($event->users)}} participantes</p>
                <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
            </div>
            
       
            
        </div>
        @endforeach

        </div>
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar eventos com {{$search}}!
            <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>


<div id="focos-geral-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2>Focos recentes</h2>
    <p class="subtitle">Vejam os focos da dengue mais recentes idenficados pelos cidadãos</p>
    @endif
    
    <div class="container">
        <div class="row">
      
            @foreach($events as $event)
        <div class="card custom-card col-md-3 col-sm-12 mx-3 my-3">
            
            <img src="/img/events/{{$event->image}}" alt="{{$event->titulo}}">

            <div class="card-body">
                <p class="card-date">{{date('d/m/Y',strtotime($event->date))}}</p>
                <h5 div class="card-title">
                    {{$event->titulo}}
                </h5>
                <p class="card-participants">{{count($event->users)}} participantes</p>
                <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
            </div>
            
       
            
        </div>
        @endforeach

        </div>
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar eventos com {{$search}}!
            <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>

<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2>Próximos eventos</h2>
    <p class="subtitle">Vejam os eventos sobre a dengue</p>
    @endif
    
    <div class="container">
        <div class="row">
      
            @foreach($events as $event)
        <div class="card custom-card col-md-3 col-sm-12 mx-3 my-3">
            
            <img src="/img/events/{{$event->image}}" alt="{{$event->titulo}}">

            <div class="card-body">
                <p class="card-date">{{date('d/m/Y',strtotime($event->date))}}</p>
                <h5 div class="card-title">
                    {{$event->titulo}}
                </h5>
                <p class="card-participants">{{count($event->users)}} participantes</p>
                <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
            </div>
            
       
            
        </div>
        @endforeach

        </div>
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar eventos com {{$search}}!
            <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>






</div>
<!-- <script>
    const cepInput = document.getElementById('search');
    const searchResultDengue = document.getElementById('search-result-dengue');

    cepInput.addEventListener('change', function() {
        const cep = cepInput.value;

        fetch(`/buscarCep/${cep}`)
            .then(response => response.json())
            .then(data => {
                searchResultDengue.innerHTML = data.logradouro + ', ' + data.bairro + ', ' + data.localidade + ' - ' + data.uf;
            })
            .catch(error => {
                console.error('Erro ao buscar CEP:', error);
            });
    });
</script> !-->
<script>
    const cepInput = document.getElementById('search');
    const searchResultDengue2 = document.getElementById('search-result-dengue2');
    const focosContainer = document.getElementById('focos-geral-container');
    const focosContainerNoBairro = document.getElementById('focos-container');

    cepInput.addEventListener('change', function() {
        const cep = cepInput.value;

        fetch(`/buscarDengue/${cep}`)
    .then(response => response.json())
    .then(data => {
        if (data.casos > 0) {
                searchResultDengue2.textContent = `Existe(m) ${data.casos} caso(s) de dengue no bairro procurado.`;
                
                showFocosDengueNoBairro();
                hideFocosDengue();
            } else {
                searchResultDengue2.textContent = `Não existem casos de dengue no bairro procurado.`;
                //hideFocosDengue();
                hideFocosDengueNoBairro();
                showFocosDengue();
            }
        })
        .catch(error => {
            console.error('Erro ao buscar casos de dengue:', error);
        });

                






});
function showFocosDengue() {
    focosContainer.style.display = 'block'; // Exibe o container de focos de dengue
}
function showFocosDengueNoBairro() {
    focosContainerNoBairro.style.display = 'block'; // Exibe o container de focos de dengue
}
function hideFocosDengue() {
    focosContainer.style.display = 'none'; // Oculta o container de focos de dengue
}
function hideFocosDengueNoBairro() {
    focosContainerNoBairro.style.display = 'none'; // Oculta o container de focos de dengue
}
</script>


@endsection