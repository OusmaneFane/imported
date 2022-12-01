@extends('layouts.app')

@section('title', ' MLC  | Review Pointeuse ')

@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<?php
ob_start()
?>

<div class="mb-4">
        <a href="?filtre=absence" type="button " class="btn btn-primary">Voir tous les absences </a>
        <a href="?filtre=retard" type="button" class="btn btn-primary">Voir tous les retards</a>
        <a href="?filtre=verify" type="button" class="btn btn-primary">Voir Toutes les heures de travail</a>
</div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filtre</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="#" method="get">
            @csrf
            <!-- The start date field -->
            <div class="col-sm-12 ml-auto">
           <label for="">Start Date</label>
            <input class="form-control  " type="date" name="startDate" placeholder="Start date" />

            <!-- The end date field -->
            <label for="">End Date</label>
            <input class="form-control" type="date" name="endDate" placeholder="End date" />
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="absent" name="absent"id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Absence
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="late" name="late" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                 Retard
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="late" name="present" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                 Présent
                </label>
              </div>

            {{-- <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
            rounded hover:shadow mt-2" type="submit" >Search</button> --}}
        </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Rechercher</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <table  class="display nowrap dataTable dtr-inline collapsed table table-bordered " style="width: 100%;" aria-describedby="example_info">
        <thead>
          <tr>
            {{-- <th scope="col">ID</th> --}}
            <th scope="col">Type</th>
            <th scope="col">Nombre</th>
         </tr>
        </thead>
         <tbody>
            <tr>
                <td>Nombre d'absence</td>
                <td>{{ $nbre_absent }}</td>
            </tr>
            <tr>
                <td>Nombre de retard</td>
                <td>{{ $nbre_retard }}</td>
            </tr>
            <tr>
                <td>Nombre d'heure réalisé /mois</td>
                <td>{{ round($sommeTime / 3600) . "H" . ($sommeTime / 60) %60 . "min" . $sommeTime% 60 . "s"}} </td>
            </tr>
         </tbody>
    </table><br>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-warning  mb-6" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-funnel-fill"></i>Filtrer</button>
    </div>

<div class="row">

    <div class="table-responsive table table-striped table-hover">
        <table id="table_id" class="display nowrap dataTable dtr-inline collapsed table table-bordered" style="width: 100%;" aria-describedby="example_info">
    <thead>
              <tr>
                {{-- <th scope="col">ID</th> --}}
                <th scope="col">no</th>
                <th scope="col">Nom</th>
                <th scope="col">Date</th>
                {{-- <th scope="col">onduty</th>
                <th scope="col">offduty</th> --}}
                <th scope="col">Jour</th>
                <th scope="col">Jour de travail</th>
                {{-- <th scope="col">Clockout</th> --}}
                {{-- <th scope="col">normal</th> --}}
                {{-- <th scope="col">realtime</th> --}}
                <th scope="col">late</th>
                {{-- <th scope="col">early</th> --}}
                <th scope="col">absent</th>
                {{-- <th scope="col">ottime</th> --}}
                <th scope="col">worktime</th>
                <th scope="col">worktime final</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr  >
                        {{-- <th scope="row">{{ $user->id }}</th> --}}
                        <td>{{ $user["no"]     }}</td>
                        <td>{{ $user["name"]      }}</td>

                        <td><p style="color: red" >{{ date("d-m-Y",(new DateTime($user["date"]))->getTimestamp()) }}
                            {{
                                $user["isCongee"] ? "(Justifié)" : ""
                            }}

                         </p></td>


                        <td>{{ date('l', strtotime($user["date"]))}}</td>
                        <td>{{ $user["timetable"] }}</td>

                        <td>{{ $user["late"]      }}</td>
                        <td>{{ $user["absent"]    }}</td>
                        <td>{{ $user["worktime"]  }}</td>
                        <?php
                                 $timestampun = $user["clockin"];
                                 $timestamptwo = strtotime($timestampun);
                                 $timestampthree = $user["clockout"];
                                 $timestampfour = strtotime($timestampthree);
                                 $final = $timestampfour - $timestamptwo  ;
                                 //$somme = sum(strtotime($timestampthree));
                         ?>
                        <td>{{  date('H:i', $final)  }}</td>
                    </tr>
                @endforeach

            </tbody>
          </table>
    </div>
</div>

@endsection
<?php
$contents = ob_get_clean();
?>
