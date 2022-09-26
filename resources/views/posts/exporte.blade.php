<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('designs/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Connexion</title>

</head>
<body>

    <div id="container">
        <!-- zone de connexion --> 
        
        <form action="/posts/exporte" method="post">
            @csrf
            <h1>Connexion</h1>
            <label><b>Login</b></label>
            <input type="text" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
            text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" placeholder="Entrer votre login" name="email" required>
            @if ($errors->has('email'))
                <span ><strong>{{ $errors->first('email') }}</strong></span>
             @endif
    
            <label><b>Mot de passe </b></label>
            <input type="password" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
            text-gray-600 text-sm focus:outline-non focus:border-gray-400 focus:ring-0" placeholder="Entrer votre mot de passe " name="password" required>
    
          <input type="submit" id='submit' value='LOGIN' >
    
        </div>
</body>
</html>