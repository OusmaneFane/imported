@extends('layouts.app')

@section('content')

<form action="/posts"method="POST" enctype="multipart/form-data">

    @csrf

    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
        <div class="custom-file text-left">
            <input type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
  </div>
  <button class="btn btn-primary bg-blue-500 ">Exporter</button>



</form>



@endsection