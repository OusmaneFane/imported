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

    <h1 style="color: black; text-align:center;">Récapitulatif de la pointeuse (mois de Septembre)</h1>
    <p>test</p>
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
<h2>Merci de prendre toutes dispositions auprès de la RH...</h2>
@endif

</body>
</html>
<?php
$contents = ob_end_flush();
?>
