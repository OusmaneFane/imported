@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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


            <div class="col-lg-12 grid-margin stretch-card ">
                <a href="{{ route('import-data') }}" class="bg-yellow-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shaadow-1g
                rounded hover:shadow mt-2">Importer</a>
                </div>

        </div>
        <div class="row">
            <div class="col-md-12 mb-1">
                <h1 class="lg-9">Liste</h1>
            </div>
            <div class="col-md-12 ">
                <table class="table_id" id="table_id">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">no</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date</th>
                        <th scope="col">onduty</th>
                        <th scope="col">offduty</th>
                        <th scope="col">clockin</th>
                        <th scope="col">Clockout</th>
                        <th scope="col">normal</th>
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
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->no }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->date }}</td>
                                <td>{{ $user->onduty }}</td>
                                <td>{{ $user->offduty }}</td>
                                <td>{{ $user->clockin }}</td>
                                <td>{{ $user->clockout }}</td>
                                <td>{{ $user->normal }}</td>
                                <td>{{ $user->realtime }}</td>
                                <td>{{ $user->late }}</td>
                                <td>{{ $user->early }}</td>
                                <td>{{ $user->absent }}</td>
                                <td>{{ $user->ottime }}</td>
                                <td>{{ $user->worktime }}</td>
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
@endsection
