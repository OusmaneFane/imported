@extends('layouts.master')

@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">



        <form method="POST" action="/posts/{{ $post->id }}">
            @method('PUT')

            @csrf

            <div class="mb-s">
                <label class="font-bold text-gray-800" for="nom">Nom</label>
                <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
                text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" id="nom"
                name="nom" value="{{ $post->nom }}">
            </div>

            <div class="mb-s">
                <label class="font-bold text-gray-800" for="prenom">Prenom</label>
                <textarea class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
                text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" id="prenom"
                name="prenom">{{ $post->prenom }}</textarea>
            </div>

            <div class="mb-s">
                <label class="font-bold text-gray-800" for="prenom">Poste</label>
                <select class="form-select" aria-label="Default select example" name="poste">
                    <option selected>Choisir le département</option>
                    <option value="IT_Departement">IT_Departement</option>
                    <option value="Ressources humaines">Ressources humaines</option>
                    <option value="Recouvrement">Recouvrement</option>
                    <option value="Stagiare">Stagiaire</option>
                  </select>
            </div>

            <div class="mb-s">
                <label class="font-bold text-gray-800" for="email">Email</label>
                <textarea class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
                text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" id="email"
                name="email">{{ $post->email }}</textarea>
            </div>
            <div class="mb-s">
                <label class="font-bold text-gray-800" for="code">Code</label>
                <textarea class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
                text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" id="code"
                name="code">{{ $post->code }}</textarea>
            </div>

            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Modifier </button>

            <a href="/" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Annuler </a>
           
        </form>
            <form  method="POST" action="/posts/{{ $post->id }}">
                @csrf
                @method('DELETE')

                <button  class="bg-red-500 ml-4 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
                rounded hover:shadow">Supprimer</button>
            </form>


    </div> 
    @endsection




{{-- template --}}




