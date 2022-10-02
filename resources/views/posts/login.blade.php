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

    <div id="container" class="mt-5">

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
            <div class="mt-0">
                <h1><b>Connexion</b></h1>
            </div>

            <label class="col-md-4 col-form-label "><b>Login</b></label>

            <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Entrer votre login" name="name" required>
                @if ($errors->has('name'))
                    <span ><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>

                <label class="col-md-4 col-form-label "><b>Mot de passe </b></label>

            <div class="col-md-10">
             <input type="password" class="form-control" placeholder="Entrer votre mot de passe " name="password" required>

              <button type="submit" id='submit' class="btn btn-primary mb-4" >LOGIN</button><br>
          <a href="/posts/inscrit">Cliquez ici pour créer un nouveau compte</a>
            </form>
        </div>
</body>
</html>
