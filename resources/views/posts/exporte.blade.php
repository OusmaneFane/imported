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
    
    <img class="rounded mx-auto d-block" src="/images/mlc.jpg" alt="logo">

    <div id="container">
        <!-- zone de connexion --> 
        
        <form action="/posts/check" method="post">
            <div class="results">
                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif
            </div>
            @csrf
            <h1>Connexion</h1>
            <label><b>Login</b></label>
            <input type="text" placeholder="Entrer votre login" name="name" required>
            @if ($errors->has('name'))
                <span ><strong>{{ $errors->first('name') }}</strong></span>
             @endif
    
            <label><b>Mot de passe </b></label>
            <input type="password" placeholder="Entrer votre mot de passe " name="password" required>
    
          <input type="submit" id='submit' value='LOGIN' >
    
        </div>
</body>
</html>