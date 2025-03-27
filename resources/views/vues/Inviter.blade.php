@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Liste des Praticiens</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($praticiens as $praticien)
                <tr>
                    <td>{{ $praticien->nom_praticien }}</td>
                    <td>{{ $praticien->prenom_praticien }}</td>
                    <td>
                        <a href="{{ url('inviter/form/'.$praticien->id_praticien) }}"
                           class="btn btn-primary btn-sm">
                            <i class="fas fa-envelope"></i> Inviter
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Aucun praticien trouvé</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
