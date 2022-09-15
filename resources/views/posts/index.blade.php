@extends('layouts.app')

@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title lg-9">Liste des Employés</h1>
        <p>
            <a href="{{ route('create') }}" class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Ajouter des employés</a>

            {{-- <a href="{{ route('import-data') }}" class="bg-yellow-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Importer</a> --}}

            {{-- <a href="{{ route('export-data') }}" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Exporter</a> --}}
        </p>
        {{-- <p class="card-description">
          Add class <code>.table-striped</code>
        </p> --}}
        <div class="table-responsive table table-striped table-hover">
        <table class="table_id" id="table_id">
            <thead>
              <tr>
                <th>
                  Profil
                </th>
                <th>
                  Nom
                </th>
                <th>
                  Prenom
                </th>
                <th>
                    Poste
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Code
                  </th>
                <th>
                      Modification
                </th>
                <th>
                    Modification
              </th>
              </tr>
            </thead>
            <tbody>

             @foreach ($posts as $post)

                  <tr>
                     <td class="py-1">
                        <img src="images/face{{ $post->id }}.jpg" alt="image{{ $post->id }}">
                    </td>

                    <td>{{ $post->nom }}</td>
                    <td>{{ $post->prenom }}</td>
                    <td>{{ $post->poste }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->code }}</td>
                    <td>
                        <a href="/posts/{{ $post->id }}/edit" class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
                            rounded hover:shadow">Modifier </a>
                    </td>
                    <td>
                        <form method="POST" action="/posts/{{ $post->id }}">
                            @csrf
                        @method('DELETE')
                        <button  class="bg-red-500 ml-4 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
                        rounded hover:shadow">Supprimer </button>
                        </form>
                    </td>
                  </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



@endsection
