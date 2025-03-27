@extends('layouts.master')
@section ('content')


    <div class="container">
        <div class="blanc">
            <h1>Liste des fiches de frais</h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Période</th>
                <th>Montant validé</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            @foreach($mesFrais as $unFrais)
                <tr>
                    <td>{{$unFrais->anneemois}} </td>
                    <td>{{$unFrais->montantvalide}} </td>
                    <td style="text-align: center;">
                        <a href="{{ url('/modifierFrais')}}/{{$unFrais->id_frais}}">
                            <span class="glyphicon glyphicon-pencil"
                                  data-toggle="tooltip" data-placement="top" title="Modifier">
                            </span></a></td>

                    <td style="text-align: center;">
                        <a href="{{ url('/removeFrais')}}/{{$unFrais->id_frais}}" onclick="return confirm('Suppression Confirmée ?');">
                            <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer"></span>
                        </a>
                    </td>

                </tr>
            @endforeach
            <BR> <BR>
        </table>
    </div>
    @include('vues/error')
@stop
