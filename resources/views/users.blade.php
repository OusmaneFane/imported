@extends('layouts.app')
@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<div class="col-lg-12 grid-margin stretch-card ">
    <div class="card d-block p-2">
        <div class="card-body">
            <div class="container pt-5">
                <div class="row">
                  <div class="col-md-12">
                      @if(Session::has('success'))
                            </div>
                            <div class="alert alert-success" role="alert">
                               {{ Session::get('success') }}
                            </div>
                     @endif
            </div>
            <div class="col-md-12">
                <form class="row g-3" action="{{ route('import_user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-auto">
                      <label class="visually-hidden">Excel</label>
                      <input type="file" class="form-control" name="excel_file" >
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary mb-2">Insérer le fichier</button>
                    </div>
                    @error('excel_file')
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
                  </form>
            </div>


        </div>
        <div class="row">

            <div class="table-responsive table table-striped table-hover">
                <table id="table_id" class="display nowrap dataTable dtr-inline collapsed table table-bordered " style="width: 100%;" aria-describedby="example_info">
                    <thead>
                      <tr>
                        {{-- <th scope="col">ID</th> --}}
                        <th scope="col">no</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date</th>
                        {{-- <th scope="col">onduty</th>
                        <th scope="col">offduty</th> --}}
                        <th scope="col">clockin</th>
                        <th scope="col">Clockout</th>
                        {{-- <th scope="col">normal</th> --}}
                        <th scope="col">realtime</th>
                        <th scope="col">late</th>
                        <th scope="col">early</th>
                        <th scope="col">absent</th>
                        <th scope="col">ottime</th>
                        <th scope="col">worktime</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($users))
                        @foreach ($users as $user)
                            <tr>
                                {{-- <th scope="row">{{ $user->id }}</th> --}}
                                <td>{{ $user->no        }}</td>
                                <td>{{ $user->name      }}</td>
                                <td>{{ $user->date      }}</td>
                                {{-- <td>{{ $user->onduty    }}</td>
                                <td>{{ $user->offduty   }}</td> --}}
                                <td>{{ $user->clockin   }}</td>
                                <td>{{ $user->clockout  }}</td>
                                {{-- <td>{{ $user->normal    }}</td> --}}
                                <td>{{ $user->realtime  }}</td>
                                <td>{{ $user->late      }}</td>
                                <td>{{ $user->early     }}</td>
                                <td>{{ $user->absent    }}</td>
                                <td>{{ $user->ottime    }}</td>
                                <td>{{ $user->worktime  }}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="3">Aucune donnée trouvée</td>
                            </tr>
                    @endif
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
