@extends('layouts.master')

@section('title', 'MLC | Ajouter employé')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">

        <form method="POST" class="form-horizontal" action="/posts" enctype="multipart/form-data">


            @csrf
            <div class="row g-3">
                <div class="col">
                  <input type="text" class="form-control" name="nom" placeholder="name" aria-label="First name">
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="prenom" placeholder="Last name" aria-label="Last name">
                </div>
              </div><br>
              <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email">


               </div>
                <div class="col">
                  <input type="text" class="form-control" name="code" placeholder="code" aria-label="Code">
                </div>
              </div><br>
              <div class="row g-3">
                <div class="col">
                    <select class="form-select" aria-label="Default select example" name="poste">
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
            rounded hover:shadow">Ajouter </button>



        </form>

    </div>
@endsection
