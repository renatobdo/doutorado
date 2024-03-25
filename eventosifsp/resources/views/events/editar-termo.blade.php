<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Termo</title>
    <!-- Adicione aqui seus estilos CSS -->
    <style>
        /* Estilos CSS */
    </style>
</head>
<body>
    <h1>Editar Termo: {{ $termo }}</h1>
    <form action="/atualizar-termo" method="POST">
        @csrf
        <input type="hidden" name="termo" value="{{ $termo }}">
        <div>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" rows="4" cols="50"></textarea>
        </div>
        <div>
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem">
        </div>
        <div>
            <button type="submit">Salvar</button>
            <button type="button" onclick="fecharPopup()">Fechar</button>
        </div>
    </form>

    <!-- Adicione aqui seus scripts JavaScript -->
    <script>
        // Função para fechar o popup
        function fecharPopup() {
            window.close();
        }
    </script>
</body>
</html>
