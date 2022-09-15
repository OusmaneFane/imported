@extends('layouts.app')

@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

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
                <textarea class="h-14 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
                text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" id="prenom"
                name="prenom">{{ $post->prenom }}</textarea>
            </div>

            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Modifier </button>

            <a href="/" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Annuler </a>
            <div>
                
            </div>
        </form>
            <form action="/posts/{{ $post->id }}">
                @csrf
                @method('DELETE')

                <button  class="bg-red-500 ml-4 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
                rounded hover:shadow">Supprimer</button>
            </form>



    </div>
    @endsection




{{-- template --}}




