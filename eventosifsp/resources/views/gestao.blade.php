
@extends('layouts.main')

@section('title', 'Página de gestão de arboviroses')

@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu com Submenu</title>
    <style>
        /* Estilo do menu */
        .menug {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .menug li {
            position: relative;
            display: inline-block;
            margin-right: 20px;
        }

        .menug li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
        }

        .menug li a:hover {
            color: #007bff;
        }

        /* Estilo do submenug */
        .submenug {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            left: 100%; /* Ajuste para aparecer à direita */
            top: 0; /* Ajuste para ficar alinhado com o item de menug */
        }

        .menug li:hover .submenug {
            display: block;
        }

        .submenug li {
            display: block;
            padding: 10px;
        }

        .submenug li:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<ul class="menug">
    <li>
        <a href="#">Governança</a>
        <ul class="submenug">
            <li>Gerenciamento de metadados</li>
            <li>Gerenciamento da qualidade de dados</li>
            <li>Gerenciamento da integração e interoperabilidades de dados</li>
        </ul>
    </li>
</ul>

<script>
    // Adiciona eventos de mouse para abrir e fechar os submenus quando o mouse passa por cima
    var itensMenu = document.querySelectorAll('.menug li');

    itensMenu.forEach(function(itemMenu) {
        // Quando o mouse entra no item de menu
        itemMenu.addEventListener('mouseenter', function() {
            var submenu = this.querySelector('.submenug');
            if (submenu) {
                submenug.style.display = 'block'; // Exibe o submenu
            }
        });

        // Quando o mouse sai do item de menu
        itemMenu.addEventListener('mouseleave', function() {
            var submenu = this.querySelector('.submenug');
            if (submenu) {
                submenug.style.display = 'none'; // Oculta o submenu
            }
        });
    });
</script>

</body>
</html>

@endsection