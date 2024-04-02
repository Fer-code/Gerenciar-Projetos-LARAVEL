<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral</title>
    <link rel="stylesheet" href="/css/menu.css">
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <br><br>
            @if (Route::has('projects.myProject'))
            <li><a href="{{ route('projects.myProject') }}">Ver Meus Projetos</a></li>
            @endif

            <li><a href="#">Gráfico de Desempenho</a></li>

            @if (Route::has('profile.user'))
            <li><a href="{{ route('profile.user') }}">Dados do Perfil</a></li>
            @endif

        </ul>
    </div>
    <div class="content">
        <!-- Conteúdo da página aqui -->
    </div>
</body>
</html>