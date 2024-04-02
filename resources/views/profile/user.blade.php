@extends('layouts.app')
@section('title', 'Minha Conta')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center mt-5">Minha Conta</h1>

        <ul>
            <div class="col-12 row mt-1 d-flex flex-wrap gap-2" style="padding-bottom:50px;padding-top:50px;">

               <div class="col card">
                    <div class="card-body p-5">

                        <p><strong>Nome:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Conta criada em:</strong> {{ $user->created_at }}</p>

                        <a href="{{ route('projects.myProject') }}">Ver Meus Projetos</a>


                    </div>
                </div>

        </ul>
    </div>
</div>
    

@endsection
