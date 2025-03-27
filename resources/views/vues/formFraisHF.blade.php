@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'validateFrais']) !!}
    <div class="col-md-12  col-sm-12 well well-md">
        <h1>Modification d'un frais Hors forfait</h1>
        <div class="form-horizontal">
            <input type="hidden" name="id_frais" value="{{$unFraisHF->id_frais}}"/>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Période : </label>
                <div class="col-md-2 col-sm-2">
                    <input type="text" name="date_fraishorsforfait" value="{{$unFraisHF->date_fraishorsforfait}} " class="form-control" placeholder="DD-MM-AAAA" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Libellé: </label>
                <div class="col-md-2  col-sm-2">
                    <input type="text" name="libelle" value="{{$unFraisHF->lib_fraishorsforfait}}" class="form-control" placeholder="Nombre de justificatifs" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Montant: </label>
                <div class="col-md-3 col-sm-3">
                    <input type="number" name="libelle" value="{{$unFraisHF->montant_fraishorsforfait}}" class="form-control" placeholder="Nombre de justificatifs" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>

                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = 'getListeFrais';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
            @if($unFrais->id_frais >0)
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <a href="/getListeFraisHF/{id}"><button type="button" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-list"></span> Frais hors forfait</button></a>
                    </div>
                </div>
            @endif
            <div class="col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-3">

            </div>
        </div>
    </div>
