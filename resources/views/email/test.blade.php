<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <h1>Test Email</h1>
    <p>Name: {{ $mailData['name'] }}</p>
    <p>DOB: {{ $mailData['dob'] }}</p> --}}
    <?php
    ob_start()
    ?>
<table  class="display nowrap dataTable dtr-inline collapsed table table-bordered " style="color:red; border:solid 2px black" aria-describedby="example_info">
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
            <td>{{ $contents[0] }}</td>
        </tr>
        <tr>
            <td>Nombre de retard</td>
            <td>{{ $contents[1] }}</td>
        </tr>
        <tr>
            <td>Nombre d'heure réalisé /mois</td>
            <td>{{ round($contents[2] / 3600) . "H" . ($contents[2] / 60) %60 . "min" . $contents[2]% 60}}</td>
        </tr>
     </tbody>
</table><br>
<?php
$contents = ob_end_flush();
    ?>
</body>
</html>
