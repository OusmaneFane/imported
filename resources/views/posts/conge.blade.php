@extends('layouts.master')

@section("content")

<form action="sposts/conge" method="POST"></form>

<h1>Congé</h1>
<div class="col-sm-12 ml-auto">
<label class="col-md-4 col-form-label "><b>Code employé</b></label>

        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="code" name="code" required>
       </div>
       <label class="col-md-4 col-form-label "><b>Motif</b></label>

       <div class="col-md-4">
           <input type="text" class="form-control" placeholder="motif du congé" name="name" required>
      </div>

    <label class="col-md-4 col-form-label" for="">Start </label>
     <input class="form-control col-md-4  " type="date" name="startDate" placeholder="Start date" required/>

     <!-- The end date field -->
     <label for="">End </label>
     <input class="form-control col-md-4" type="date" name="endDate" placeholder="End date" required/>
     {{-- <label for="">Nom</label>
     <input class="form-control" type="text" name="name" placeholder="Nom" /> --}}
     <div class="form-check">
        
      
     {{-- <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
     rounded hover:shadow mt-2" type="submit" >Search</button> --}}
 </div>

   <div class="mt-4">
     <button type="submit" class="btn btn-primary">Enregistrer</button>
   </div>
</div>
</form>

@endsection