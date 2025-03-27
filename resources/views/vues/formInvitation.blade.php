@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>
                    @if(isset($activite))
                        Modification Activité
                    @else
                        Nouvelle Activité
                    @endif
                </h3>
            </div>
            <div class="card-body">
                {!! Form::open(['url' => '/activite/update']) !!}
{{--                <form method="POST" action="@if(isset($activite))/activite/update/{{ $activite->id_activite_compl }}@else/activite/store@endif">--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thème</label>
                                <input type="text" name="theme_activite" class="form-control" value="{{ $activite->theme_activite ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date_activite" class="form-control" value="{{ isset($activite) ? $activite->date_activite->format('Y-m-d') : '' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lieu</label>
                                <input type="text" name="lieu_activite" class="form-control" value="{{ $activite->lieu_activite ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label>Visiteur</label>
                                <select name="id_visiteur" class="form-control">
                                    @foreach($visiteurs as $visiteur)
                                        <option value="{{ $visiteur->id_visiteur }}" @if(isset($activite) && $activite->visiteur && $activite->visiteur->id_visiteur == $visiteur->id_visiteur) selected @endif>
                                            {{ $visiteur->prenom_visiteur }} {{ $visiteur->nom_visiteur }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Motif</label>
                        <textarea name="motif_activite" class="form-control" rows="3">{{ $activite->motif_activite ?? '' }}</textarea>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="/activite" class="btn btn-secondary">Annuler</a>
                    </div>
            </div>
        </div>
    </div>

