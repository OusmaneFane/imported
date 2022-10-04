@extends('layouts.master')

@section("content")

<form action="/posts/traite" method="post">

@csrf
<div class="col-sm-12 ml-auto">
<label class="col-md-4 col-form-label "><b>Code employé</b></label>

        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="code" name="code" >
       </div>
       <label class="col-md-4 col-form-label "><b>Motif</b></label>

       <div class="col-md-4">
           <input type="text" class="form-control" placeholder="motif du congé" name="motif" >
      </div>

    <label class="col-md-4 col-form-label" for="">Start </label>
     <input class="form-control col-md-4  " type="date" name="startDate" placeholder="Start date" />

     <!-- The end date field -->
     <label for="">End </label>
     <input class="form-control col-md-4" type="date" name="endDate" placeholder="End date" />
   <div class="mt-4">
     <button type="submit" class="btn btn-primary">Enregistrer</button>
   </div>
</div>
</form>

@endsection
