@extends('layouts.master')

@section("content")

<form action="/posts/traite" method="post">

@csrf
<div class="col-sm-12 ml-auto">




        <div class="row g-3">
            <div class="col">
                <label class="col-md-4 col-form-label "><b>Code employé</b></label>
                <input type="text" class="form-control " placeholder="motif du congé" name="motif" >
            </div>
            <div class="col">
                <div class="col">
                    <label class="col-md-4 col-form-label "><b>Nom </b></label>

                    <select class="form-select" aria-label="Default select example" name="poste">
                       @foreach ($posts as $post)
                           <option value="{{ $post->code }}">{{ $post->nom }} {{ $post->prenom }}</option>
                       @endforeach
                           </select>
               </div>
             </div>
          </div><br>


          <div class="row g-3">
            <div class="col">
                <label class="col-md-4 col-form-label" for=""><b>Start </b></label>
                <input class="form-control   " type="date" name="startDate" placeholder="Start date" />
                      </div>
            <div class="col">
                <label class="col-md-4 col-form-label" for=""><b>End </b></label>
                <input class="form-control  " type="date" name="endDate" placeholder="End date" />
                       </div>
          </div><br>


   <div class="mt-4 text-center">
     <button type="submit" class="btn btn-primary">Enregistrer</button>
   </div>
</div>
</div>
</form>

@endsection
