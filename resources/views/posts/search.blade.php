@extends('layouts.app')

@section('content')

<div class="table-responsive table table-striped table-hover">
    <table id="table_id" class="display nowrap dataTable dtr-inline collapsed table table-bordered" style="width: 100%;" aria-describedby="example_info">
    <thead>
      <tr>
          <th>Profil </th>
          <th>Nom</th>
          <th> Prenom</th>
          <th> Département</th>
          {{-- <th>
            Email
          </th> --}}
          <th>Code</th>
         
      </tr>
    </thead>
    <tbody>

     @foreach ($posts as $post)


          <tr class="foobar">
             <td class="py-1">
                <a href="/posts/verified/{{  $post->code  }}"><img href src="/images/profil.png" alt="image{{ $post->id }}"></a>
            </td>

            <td>{{  $post->nom  }}</td>
            <td>{{ $post->prenom }}</td>
            <td>{{ $post->poste }}</td>
            {{-- <td>{{ $post->email }}</td> --}}
            <td>{{ $post->code }}</td>
            {{-- <td>
                <a href="/posts/{{ $post->id }}/edit" class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-2 shaadow-1g
                    rounded hover:shadow">Modifier </a>
            </td>
            <td>
                <form method="POST" action="/posts/{{ $post->id }}">
                    @csrf
                @method('DELETE')
                <button  class="bg-red-500 ml-4 tracking-wide text-white px-6 py-2 inline-block mb-2 shaadow-1g
                rounded hover:shadow">Supprimer </button>
                </form>
            </td> --}}
          </tr>

      @endforeach

    </tbody>
  </table>
</div>


@endsection