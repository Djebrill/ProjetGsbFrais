<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dao\ServicePraticien;
use App\Models\Praticien;
use App\Models\ActiviteCompl;
use App\Models\Inviter;

class PraticienController extends Controller
{

    public function listePraticiens()
    {
        $service = new ServicePraticien();
        $praticiens = $service->getListePraticiens();
        return response()->view('vues/inviter', compact('praticiens'))
            ->header('Content-Type', 'text/html');
    }

    public function showInvitationForm($id)
    {
        $service = new ServicePraticien();
        $praticien = $service->getPraticienById($id);
        return view('vues/formInvitation', compact('praticien'));
    }

    public function storeInvitation(Request $request)
    {
        $validated = $request->validate([
            'id_praticien' => 'required|exists:praticien,id_praticien',
            'theme_activite' => 'required|string|max:255',
            'date_activite' => 'required|date',
            'lieu_activite' => 'required|string|max:255',
            'motif_activite' => 'nullable|string'
        ]);

        $service = new ServicePraticien();
        $result = $service->creerInvitation(
            $request->id_praticien,
            $request->only(['theme_activite', 'date_activite', 'lieu_activite', 'motif_activite'])
        );

        if ($result) {
            return redirect('inviter')->with('success', 'Invitation envoyée avec succès');
        }

        return back()->with('error', 'Erreur lors de la création de l\'invitation');
    }
}
