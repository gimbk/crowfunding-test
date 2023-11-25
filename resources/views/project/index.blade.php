@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-11">

            <h2>Tutoriel Laravel 9 CRUD</h2>

        </div>

        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('project/create') }}">Ajouter</a>
        </div>

    </div>

 

    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

 

    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>Nom</th>
            <th>Détail</th>
            <th>Company</th>
            <th>fortune</th>
            <th>Actions</th>

        </tr>

        @foreach ($projects as $index => $project)

            <tr>
                <td>{{ $index }}</td>
                <td>{{ $project->nom }}</td>
                <td>{{ $project->detail }}</td>
                <td>{{ $project->company }}</td>
                <td>{{ $project->fortune }}</td>
                <td>

                    <form action="{{ url('project/'. $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-info" href="{{ url('project/'. $project->id) }}">Voir</a>
                        <a class="btn btn-primary" href="{{ url('project/'. $project->id .'/edit') }}">Modifier</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>

                    </form>
                </td>

            </tr>

        @endforeach
    </table>

@endsection