@extends('layouts.master')

@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">



        <form method="POST" action="/posts/{{ $post->id }}">
            @method('PUT')

            @csrf
            <div class="row g-3">
                <div class="col">
                  <input type="text" class="form-control" name="nom" placeholder="name" aria-label="First name" value="{{ $post->nom }}">
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="prenom" placeholder="Last name" aria-label="Last name" value="{{ $post->prenom }}">
                </div>
              </div><br>
              <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" value="{{ $post->email }}">


               </div>
                <div class="col">
                  <input type="text" class="form-control" name="code" placeholder="code" aria-label="Code" value="{{ $post->code }}">
                </div>
              </div><br>
              <div class="row g-3">
                <div class="col">
                    <select class="form-select" aria-label="Default select example" name="poste" value="{{ $post->poste }}">
                        <option value="IT_Departement">IT_Departement</option>
                        <option value="Ressources humaines">Ressources humaines</option>
                        <option value="Recouvrement">Recouvrement</option>
                        <option value="IOB">IOB</option>
                        <option value="Direction">Direction</option>
                        <option value="Controle">Controle</option>
                        <option value="Comptabilité">Comptabilité</option>

                        <option value="Stagiare">Stagiaire</option>
                      </select>                </div>

              </div><br>

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




