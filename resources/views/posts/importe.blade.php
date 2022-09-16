@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


<div class="col-md-12">
    <form class="row g-3" action="{{ route('import_user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-auto">
          <label class="visually-hidden">Excel</label>
          <input type="file" class="form-control" name="excel_file" >
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-2">Insérer le fichier</button>
        </div>
        @error('excel_file')
       <span class="text-danger">{{ $message }}</span>
       @enderror
      </form>
</div>




    {{-- <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data"> --}}

        {{-- <form method="POST" action="/posts" enctype="multipart/form-data">
        @csrf

    <div class="form-group">
        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
            <div class="custom-file text-left">
                <input type="file" name="excel_file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        @error('excel_file')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow">Inserer</button> --}}
            {{-- <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
          </div>
                 <button class="btn btn-primary bg-blue-500 ">Importer</button>

      </div> --}}
{{-- </form>

    </div> --}}

@endsection
