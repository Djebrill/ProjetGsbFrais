@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Activités Complémentaires</h2>

        <a href="{{ url('activite/form') }}" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Nouvelle Activité
        </a>

        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Thème</th>
                <th>Lieu</th>
                <th>Visiteur</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($activites as $activite)
                <tr>
                    <td>{{ $activite->id_activite_compl }}</td>
                    <td>{{ $activite->date_activite->format('d/m/Y') }}</td>
                    <td>{{ $activite->theme_activite }}</td>
                    <td>{{ $activite->lieu_activite }}</td>
                    <td>
                        {{ $activite->visiteur->prenom_visiteur ?? '' }}
                        {{ $activite->visiteur->nom_visiteur ?? '-' }}
                    </td>
                    <td>
                        <a href="{{ url('activite/form/'.$activite->id_activite_compl) }}"
                           class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ url('activite/delete/'.$activite->id_activite_compl) }}"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Supprimer cette activité ?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
