<?php

namespace App\dao;

use App\Models\FraisHF;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

class ServiceFraisHF{
    public function getFraisHF($id_frais)
    {
        try {
            $lesFrais = DB::table("fraishorsforfait")
                ->select()
                ->where('id_frais','=',$id_frais)
                ->orderBy("date_fraishorsforfait")
                ->get();
            return $lesFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public  function getByIdHF($id_frais)
    {
        try {
            $unFrais = DB::table("fraishorsforfait")
                ->select()
                ->where('id_frais','=',$id_frais)
                ->first();
            return $unFrais;
        }catch (QueryException $e){
            throw new MonException($e->getMessage());
        }
    }
    public function updateFraisHF($id_fraishorsforfait,$date_fraishorsforfait,$lib_fraishorsforfait, $montant_fraishorsforfait){
        try {
            DB::table("fraishorsforfait")
                ->where("id_fraishorsforfait","=",$id_fraishorsforfait)
                ->update(['date_fraishorsforfait'=>$date_fraishorsforfait,'lib_fraishorsforfait'=>$lib_fraishorsforfait,'montant_fraishorsforfait'=>$montant_fraishorsforfait]);
        }catch (QueryException $e){
            throw new MonException($e->getMessage());
        }
    }
    public function insertFrais($id_visiteur,$anneemois,$nbjustificatif){
        try {
            $aujourdhui = date("Y-m-d");
            DB::table("frais")
                ->insert(['datemodification'=>$aujourdhui,
                    'id_etat'=>2,
                    'id_visiteur'=>$id_visiteur,
                    'anneemois'=>$anneemois,
                    'nbjustificatifs'=>$nbjustificatif]);
        }catch (QueryException $e){
            throw new MonException($e->getMessage());
        }
    }
}
