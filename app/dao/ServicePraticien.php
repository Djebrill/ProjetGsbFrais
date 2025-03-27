<?php

namespace App\dao;

use App\Models\Praticien;
use App\Models\ActiviteCompl;
use App\Models\Inviter;
use Illuminate\Support\Facades\DB;

class ServicePraticien
{
    public function getListePraticiens()
    {
        return Praticien::select('id_praticien', 'nom_praticien', 'prenom_praticien')->get();
    }

    public function getPraticienById($id)
    {
        return Praticien::findOrFail($id);
    }

    public function creerInvitation($id_praticien, $data)
    {
        try {
            DB::beginTransaction();

            $activite = ActiviteCompl::create($data);

            Inviter::create([
                'id_praticien' => $id_praticien,
                'id_activite_compl' => $activite->id_activite_compl
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
