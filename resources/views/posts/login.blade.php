<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{url('designs/style.css')}}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Connexion</title>

</head>
<body>


    <section class="vh-70" style="background-color: #ca415f;">
       
 
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-9">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-5">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="/images/ml3.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                      <form action="/posts/check" method="post">
                        <div class="results">
                            @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                            @endif
                        </div>
                            @csrf
                        <div class="d-flex align-items-center ">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>

                          <span class=""> <img class="rounded float-end" src="/images/logo1.jpg" alt=""></span>

                        {{-- <h5 class="fw-normal pb-3" style="letter-spacing: 1px;">Connexion</h5> --}}
                    </div>
                        <div class="form-outline mt-auto">
                            <label class="form-label" for="form2Example17">Login</label>
                          <input type="text" id="form2Example17" name="name" class="form-control form-control-lg" />
                          @if ($errors->has('name'))
                            <span ><strong>{{ $errors->first('name') }}</strong></span>
                          @endif

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27">Password</label>
                          <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                          @if ($errors->has('name'))
                            <span ><strong>{{ $errors->first('name') }}</strong></span>
                          @endif
                        </div>

                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>

               

                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>
