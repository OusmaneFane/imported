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

@endsection
