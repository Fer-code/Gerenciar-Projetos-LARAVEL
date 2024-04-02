@extends('layouts.app')

@section('title', 'My Wallet')

@section('content')

<link rel="stylesheet" href="/css/menu.css">
<link rel="stylesheet" href="/css/modal.css">



<div class="row justify-content-center">
    <div class="col-md-10">
        <h1 class="text-center mt-5">Meus Projetos</h1>





          <form id="filterForm" method="GET">
            <div>
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="">Todos</option>
                    <option value="to do">To Do</option>
                    <option value="doing">Doing</option>
                    <option value="done">Done</option>
                </select>
            </div>
            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="date">Publicado nos últimos:</label>
                <select name="date" id="date">
                    <option value="">Qualquer data</option>
                    <option value="15">15 dias</option>
                    <option value="30">30 dias</option>
                </select>
            </div>
            <button type="submit">Filtrar</button>
        </form>








        <button class="btn btn-dark text-end" id="openModalBtn">

          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="36" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
          </svg>

        </button>

        <ul>
            <div class="col-12 row mt-1 d-flex flex-wrap gap-2" style="padding-bottom:50px;padding-top:50px;">

                @foreach($projects as $project)

                    <div class="col card">
                        <div class="card-header">
                          <p class="mt-3">{{ $project->status }}</p>

                        </div>
                        <div class="card-body">

                            <h2>{{ $project->title }} </h2>
                            <p>{{ $project->description }}</p>
                        </div>
                    </div>

                @endforeach
        </ul>







        <!-- Modal -->
        <div id="myModal" class="modal">
          <!-- Conteúdo da modal -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Adicionar Projeto</h2>
            <form id="projectForm" action="{{ route('projects.store') }}" method="POST">
              @csrf
              <div>
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" required>
              </div>
              <div>
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" required></textarea>
              </div>
              <button type="submit">Salvar Projeto</button>
            </form>
          </div>
        </div>












       
    </div>
</div>
    
<script>

var openModalBtn = document.getElementById("openModalBtn");

// Seleciona a modal
var modal = document.getElementById("myModal");

// Seleciona o elemento de fechar a modal
var closeModalSpan = document.getElementsByClassName("close")[0];

// Quando o usuário clicar no botão, abre a modal
openModalBtn.onclick = function() {
  modal.style.display = "block";
}

// Quando o usuário clicar no elemento de fechar, fecha a modal
closeModalSpan.onclick = function() {
  modal.style.display = "none";
}

// Quando o usuário clicar fora da modal, fecha a modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

document.getElementById("filterForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita o envio padrão do formulário
    
    // Obter os valores do formulário
    var status = document.getElementById("status").value;
    var name = document.getElementById("name").value;
    var date = document.getElementById("date").value;

    // Redirecionar para a página de projetos com os parâmetros de filtro na URL
    window.location.href = "/projects?status=" + status + "&name=" + name + "&date=" + date;
});
</script>

@endsection
