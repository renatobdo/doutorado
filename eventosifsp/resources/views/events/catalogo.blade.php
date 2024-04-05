@extends('layouts.main')

@section('title', 'Página de Catálogo sobre arboviroses')

@section('content')

<div id="search-container-catalogo" class="clearfix">
    <h1>Catálogo de dados</h1>
    
    <div id="search-result">
      
        <table class="table">
            <thead>
                <tr>
                    <th>Termo</th>
                    <th>Descrição</th>
                    <th>Tipo de metadado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($termos as $termo)
                <tr>
                    <td>
                       
                            <!-- Defina o atributo data-descricao no span -->
                            <span class="term-link styled-link" data-term="{{ $termo->termo }}" data-descricao="{{ $termo->descricao }}">{{ $termo->termo }}</span><br>
                        </td>
                       
                    <td><span class="term-link" data-descricao="{{ $termo->descricao }}">{{ $termo->descricao}}</span></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        
     
    </div>
    
    
</div>
<!-- Modal para editar termo -->
<div class="modal fade" id="modalEditarTermo" tabindex="-1" aria-labelledby="modalEditarTermoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarTermoLabel">Editar Termo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Campos para exibir o termo e a descrição -->
                <div class="mb-3">
                    <label for="termo" class="form-label">Termo:</label>
                    <input type="text" class="form-control" id="termo" name="termo" readonly>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4" readonly></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Obtenha todos os links do catálogo
    const linksCatalogo = document.querySelectorAll('.term-link');

    // Adicione um ouvinte de evento de clique a cada link do catálogo
    linksCatalogo.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Previna o comportamento padrão do link

            const termo = link.getAttribute('data-term'); // Obtenha o termo do atributo data-term
            const descricao = link.getAttribute('data-descricao'); // Obtenha a descrição do termo

            // Preencha os campos de texto do modal com o termo e a descrição capturados
            document.getElementById('termo').value = termo;
            document.getElementById('descricao').value = descricao;

            
            // Abra o modal de edição do termo
            const modalEditarTermo = new bootstrap.Modal(document.getElementById('modalEditarTermo'));
            modalEditarTermo.show();
        });
    });
</script>
     
@endsection
