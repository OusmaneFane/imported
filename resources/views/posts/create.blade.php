@extends('layouts.app')

@section('content')
    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">

        <form method="POST" action="/posts" enctype="multipart/form-data">


            @csrf

            <div class="mb-s">
                <label class="font-bold text-gray-800" for="nom">Nom</label>
                <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
                text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" id="nom"
                name="nom">
            </div>

            <div class="mb-s">
                <label class="font-bold text-gray-800" for="prenom">Prenom</label>
                <textarea class="h-14 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
                text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" id="prenom"
                name="prenom"></textarea>
            </div>


            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Ajouter </button>



        </form>

    </div>
@endsection
