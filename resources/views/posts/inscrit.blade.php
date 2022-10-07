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

    <img class="rounded mx-auto d-block" src="/images/logo.jpg" alt="logo">

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
                <div class="row g-3">
                    <div class="col">
                      <input type="text" class="form-control" name="name" placeholder="login" aria-label="First name">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Last name">
                    </div>
                  </div><br>
                  <div class="row g-3">
                    <div class="col">
                        <input type="password" class="form-control" name="password" placeholder="mot de passe" aria-label="Email">
                   </div>
                    <div class="col">
                      <input type="password" class="form-control" name="password_confirm" placeholder="password confirm" aria-label="Code">
                    </div>
                  </div><br>

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
