<?php
ob_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Send Email</title>
</head>
<body>
    {{-- <h1>Test Email</h1>
    <p>Name: {{ $mailData['name'] }}</p>
    <p>DOB: {{ $mailData['dob'] }}</p> --}}
    <img src="/images/logo3.png"
    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
    <h1 style="color: black; text-align:center;">RECAP POINTEUSE: NOVEMBRE 2022</h1>
<table  class="display nowrap dataTable dtr-inline collapsed table table-bordered " style=" border-collapse: collapse; width: 100%">

    {{-- <style>
        table {
          border-collapse: collapse;
          width: 100%;
        }

        th, td {
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
          background-color: #ff3763;
          color: white;
        }
        </style> --}}
    <thead>
      <tr style="background-color: #f2f2f2">
        {{-- <th scope="col">ID</th> --}}
        <th scope="col" style="text-align: left ; padding: 8px;  background-color: #ff3763; color: white;">Type</th>
        <th scope="col" style="text-align: left ; padding: 8px; background-color: #ff3763; color: white; ">Nombre</th>
     </tr>
    </thead>
     <tbody>
        <tr style="background-color: #f2f2f2">
            <td style="text-align: left ; padding: 8px; ">Nombre d'absence</td>
            <td style="text-align: left ; padding: 8px; ">{{ $contents[0] }}</td>
        </tr>
        <tr>
            <td style="text-align: left ; padding: 8px; ">Nombre de retard</td>
            <td style="text-align: left ; padding: 8px; ">{{ $contents[1] }}</td>
        </tr>
        {{-- <tr>
            <td style="text-align: left ; padding: 8px; ">Nombre d'heure réalisé /mois</td>
            <td style="text-align: left ; padding: 8px; ">{{ round($contents[2] / 3600) . " heures " . ($contents[2] / 60) %60 . " minutes " . $contents[2]% 60 . " secondes"}} / 144 heures</td>
        </tr> --}}
     </tbody>
</table><br>

@if( $contents[0] > 0)
<h4>Merci de justifier vos absences auprès du RH.</h4>
@endif


<div class="row">

    <div class="table-responsive table table-striped table-hover">
        <table id="table_id" class="display nowrap dataTable dtr-inline collapsed table table-bordered" style=" border-collapse: collapse; width: 100%; border: 1px solid #ddd; text-align: left" aria-describedby="example_info">
    <thead>
              <tr style="hover:background-color: coral;">
                {{-- <th scope="col">ID</th> --}}
                {{-- <th scope="col">no</th> --}}
                <th scope="col" style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white;border: 1px solid #ddd; text-align: left;">Nom</th>
                <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white; border: 1px solid #ddd; text-align: left;">Date</th>
                {{-- <th scope="col" style=" padding: 4px; text-align: left; border-bottom: 1px solid #ddd;">onduty</th>
                <th scope="col" style=" padding: 4px; text-align: left; border-bottom: 1px solid #ddd;">offduty</th> --}}
                <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white; border: 1px solid #ddd; text-align: left;">Jour correspondant</th>
                {{-- <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white; border: 1px solid #ddd; text-align: left;">Jour de travail</th> --}}
                {{-- <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white;">Clockout</th> --}}
                {{-- <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white;">normal</th> --}}
                {{-- <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white;">realtime</th> --}}
                <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white; border: 1px solid #ddd; text-align: left;">late</th>
                {{-- <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white;">early</th> --}}
                <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white; border: 1px solid #ddd; text-align: left;">absent</th>
                {{-- <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white;">ottime</th> --}}
                {{-- <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white;">worktime</th> --}}
                <th scope="col"  style="text-align: left ; padding: 4px;  background-color: #ff3763; color: white; border: 1px solid #ddd; text-align: left;">worktime final</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($contents[3] as $user)
                    <tr style="background-color: #f2f2f2" >
                        {{-- <th scope="row">{{ $user->id }}</th> --}}
                        {{-- <td>{{ $user["no"]     }}</td> --}}
                        <td  style="text-align: left; padding: 4px; border: 1px solid #ddd; text-align: left;">{{ $user["name"]      }}</td>

                        <td  style="text-align: left; padding: 4px; border: 1px solid #ddd; text-align: left;"><p style="color: red" >{{ date("d-m-Y",(new DateTime($user["date"]))->getTimestamp()) }}
                            {{
                                $user["isCongee"] ? "(Congé)" : ""
                            }}


                         </p></td>

                         @if(date('l', strtotime($user["date"])) == "Saturday")
                         <td  style="text-align: left; padding: 4px; border: 1px solid #ddd; text-align: left;">{{ date('l', strtotime($user["date"]))->except(['Saturday'])}}</td>

                         @endif
                        <td  style="text-align: left; padding: 4px; border: 1px solid #ddd; text-align: left;">{{ date('l', strtotime($user["date"]))}}</td>
                        {{-- <td  style="text-align: left; padding: 4px; border: 1px solid #ddd; text-align: left;">{{ $user["timetable"] }}</td> --}}

                        <td  style="text-align: left; padding: 4px; border: 1px solid #ddd; text-align: left;">{{ $user["late"]      }}</td>
                        <td  style="text-align: left; padding: 4px; border: 1px solid #ddd; text-align: left;">{{ $user["absent"]    }}</td>
                        {{-- <td>{{ $user["worktime"]  }}</td> --}}
                        <?php
                                 $timestampun = $user["clockin"];
                                 $timestamptwo = strtotime($timestampun);
                                 $timestampthree = $user["clockout"];
                                 $timestampfour = strtotime($timestampthree);
                                 $final = $timestampfour - $timestamptwo  ;
                                 //$somme = sum(strtotime($timestampthree));
                         ?>
                        <td  style="text-align: left; padding: 4px; border: 1px solid #ddd; text-align: left;">{{  date('H:i', $final)  }}</td>
                    </tr>
                @endforeach

            </tbody>
          </table>
    </div>
</div>
</body>
</html>
<?php
$contents = ob_end_flush();
?>
