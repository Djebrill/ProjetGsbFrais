<?php

namespace App\dao;

use App\Models\Frais;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

Class ServiceFrais{

    public function getFrais($id_visiteur){
        try{
            $lesFrais = DB::table('frais')
                ->select()
                ->where('id_visiteur', '=' , $id_visiteur)
                ->OrderBy('anneemois')
                ->get();
            return $lesFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getById($id_frais){
        try{
            $unFrais = DB::table('frais')
                ->select()
                ->where('id_frais', '=' , $id_frais)
                ->first();
            return $unFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function updateFrais($id_frais, $anneemois, $nbjustificatifs){
        try {
            $aujourdhui = date("Y-m-d");
            DB::table('frais')
                ->where('id_frais', '=' , $id_frais)
                ->update(['datemodification' => $aujourdhui, 'anneemois' => $anneemois, 'nbjustificatifs' => $nbjustificatifs]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function insertFrais($id_visiteur, $anneemois, $nbjustificatifs)
    {
        try{
        $aujourdhui = date("Y-m-d");
        DB::table('frais')
            ->insert(['datemodification' => $aujourdhui, 'id_etat' =>2,'id_visiteur' => $id_visiteur, 'anneemois' => $anneemois, 'nbjustificatifs' => $nbjustificatifs]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }

    }

    public function deleteFrais($id_frais){
        $erreur="";
        try {
            $unFrais = DB::table('frais')
                ->where('id_frais',$id_frais)
                ->delete();
        } catch (QueryException $e) {
            $erreur=$e->getMessage();
            if ($e->getCode()==23000) {
                $erreur="Impossible de supprimer une fiche ayant des frais liées";
            }
            throw new MonException($erreur, 5);
        }
    }

}


?>
