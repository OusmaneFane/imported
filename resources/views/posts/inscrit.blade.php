<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('designs/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Inscription</title>

</head>
<body>

    <img class="rounded mx-auto d-block" src="/images/mlc.jpg" alt="logo">

    <div id="container">
        <!-- zone de connexion -->

        <form action="/posts/trait" method="post">
            <div class="results">
                @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif
            </div>
          
            @csrf
            <div class="mt-0 bg-secondary bg-gradient">
                <h1 >Inscription</h1>
            </div><br>
            <label><b>Login</b></label>
            <input type="text" placeholder="Entrer votre login" name="name" required>
            @if ($errors->has('email'))
                <span ><strong>{{ $errors->first('email') }}</strong></span>
             @endif
             <label><b>Email</b></label>
             <input type="text" placeholder="Entrer votre email" name="email" required>
             <span class="text-danger">@error('email'){{ $message }}@enderror</span>

            <label><b>Mot de passe </b></label>
            <input type="password" placeholder="Entrer votre mot de passe " name="password" required>
            <span class="text-danger">@error('password'){{ $message }}@enderror</span>

            <label><b>Confirmer le Mot de passe </b></label>
            <input type="password" placeholder="Entrer votre mot de passe " name="password_confirm" required>
            <span class="text-danger">@error('password_confirm'){{ $message }}@enderror</span>

          <input type="submit" id='submit' value='LOGIN' >
<a href="/posts/exporte">Cliquez ici pour vous connecter</a>
        </div>
</body>
</html>
