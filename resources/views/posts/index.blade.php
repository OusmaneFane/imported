
@extends('layouts.master')

@section('title', 'MLC | Liste des employés')
@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>



<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title font-weight-bold">MALI-CREANCES </h1>
        <p>
            <a href="{{ route('create') }}" class="bg-pink-600 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Ajouter un nouvel employé</a>

            <a href="/users" class="bg-yellow-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Importer</a>

            {{-- <a href="{{ route('export-data') }}" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Exporter</a> --}}
        </p>

        <div class="table-responsive table table-striped table-hover">
     <table id="table_id" class="display nowrap dataTable dtr-inline collapsed table table-bordered" style="width: 100%;" aria-describedby="example_info">
            <thead>
              <tr>
                  <th>Profil </th>
                  <th>Nom</th>
                  <th> Prenom</th>
                  <th> Poste</th>
                  <th>Code</th>
                  <th>Modificaion</th>
                  <th>Modification</th>
              </tr>
            </thead>
            <tbody>

             @foreach ($posts as $post)


                  <tr class="foobar">
                     <td class="py-1">
                        <a href="/posts/verified/{{  $post->code  }}"><img href src="images/face{{ $post->id }}.jpg" alt="image{{ $post->id }}"></a>
                    </td>

                    <td>{{  $post->nom  }}</td>
                    <td>{{ $post->prenom }}</td>
                    <td>{{ $post->poste }}</td>
                    {{-- <td>{{ $post->email }}</td> --}}
                    <td>{{ $post->code }}</td>
                    <td>
                        <a href="/posts/{{ $post->id }}/edit" class="bg-yellow-500 ml-5 tracking-wide text-white px-2 py-1  shaadow-1g
                            rounded hover:shadow"><i class="bi bi-pencil-square"></i> </a>
                    </td>
                    <td>
                        <form method="POST" action="/posts/{{ $post->id }}">
                            @csrf
                        @method('DELETE')
                        <button  class="bg-red-500 ml-5 tracking-wide text-white px-2 py-1  shaadow-1g
                        rounded hover:shadow"><i class="bi bi-trash-fill"></i> </button>
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
