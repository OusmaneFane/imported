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

    <div id="container" class="mt-5">
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
            <div class="mt-0 ">
                <h1 >Inscription</h1>
            </div><br>
            <label  class="col-md-4 col-form-label "><b>Login</b></label>
            <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Entrer votre login" name="name" required>
                <span class="text-danger">@error('name'){{ $message }}@enderror</span><br>
            </div>

             <label  class="col-md-4 col-form-label "><b>Email</b></label>
             <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Entrer votre email" name="email" required>
                <span class="text-danger">@error('email'){{ $message }}@enderror</span><br>
             </div>

            <label  class="col-md-4 col-form-label "><b>Mot de passe </b></label>
            <div class="col-md-10">
                <input type="password" class="form-control" placeholder="Entrer votre mot de passe " name="password" required>
                <span class="text-danger">@error('password'){{ $message }}@enderror</span><br>
            </div>
            <label  class="col-md-6 col-form-label "><b>Confirmer le Mot de passe </b></label>
            <div class="col-md-10">
                <input type="password" class="form-control" placeholder="Entrer votre mot de passe " name="password_confirm" required>
                <span class="text-danger">@error('password_confirm'){{ $message }}@enderror</span><br>
            </div>
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                     <button type="submit" class="btn btn-primary" id='submit'>S'incrire</button>
                </div>
                <a href="/posts/login">Cliquez ici pour vous connecter</a>

            </div>
        </form>
        </div>
</body>
</html>
