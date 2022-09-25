<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('designs/style.css')}}">
    <title>Connexion</title>
</head>
<body>

    <div id="container">
        <!-- zone de connexion --> 
        
        <form action="{{ route('board')}}" method="post">
            @csrf
            <h1>Connexion</h1>
            <label><b>Login</b></label>
            <input type="email" placeholder="Entrer votre login" name="email" required>
            @if ($errors->has('email'))
                <span ><strong>{{ $errors->first('email') }}</strong></span>
                @endif
    
            <label><b>Mot de passe </b></label>
            <input type="password" placeholder="Entrer votre mot de passe " name="password" required>
    
          <input type="submit" id='submit' value='LOGIN' >
    
        </div>
</body>
</html>