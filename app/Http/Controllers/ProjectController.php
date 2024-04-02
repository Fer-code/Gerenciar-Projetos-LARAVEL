<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function myProject()
    {
        if (Auth::check()) {
            
            $user = Auth::user();
            $projects = $user->projects;
            return view('projects.myProject', compact('projects'));
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Criar um novo projeto associado ao usuário autenticado
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->status = 'To Do';
        $project->user_id = Auth::id(); // Associar o projeto ao usuário autenticado
        $project->save();

        // Redirecionar de volta para a página de projetos
        return redirect()->route('projects.myProject')->with('success', 'Projeto criado com sucesso!');
    }
}