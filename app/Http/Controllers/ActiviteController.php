<?php

namespace App\Http\Controllers;

use App\Models\ActiviteCompl;
use App\Models\Visiteur;
use App\Models\Realiser;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function listeActivites()
    {
        $activites = ActiviteCompl::with('visiteur')->get();
        return view('vues/ListeActivite', compact('activites'));
    }

    public function showActiviteForm($id = null)
    {
        $data = [
            'activite' => $id ? ActiviteCompl::find($id) : null,
            'visiteurs' => Visiteur::all()
        ];
        return view('vues.formInvitation', $data);
    }

    public function storeActivite(Request $request)
    {
        $validated = $this->validateActivite($request);

        $activite = ActiviteCompl::create($validated);
        $this->linkVisiteur($activite->id_activite_compl, $request->id_visiteur);

        return redirect('listeActivites')->with('success', 'Activité créée avec succès');
    }

    public function updateActivite(Request $request, $id)
    {
        $validated = $this->validateActivite($request);

        ActiviteCompl::findOrFail($id)->update($validated);
        $this->linkVisiteur($id, $request->id_visiteur);

        return redirect('listeActivites')->with('success', 'Activité mise à jour avec succès');
    }

    public function deleteActivite($id)
    {
        Realiser::where('id_activite_compl', $id)->delete();
        ActiviteCompl::findOrFail($id)->delete();

        return redirect('listeActivites')->with('success', 'Activité supprimée avec succès');
    }

    protected function validateActivite(Request $request)
    {
        return $request->validate([
            'theme_activite' => 'required|string|max:255',
            'date_activite' => 'required|date',
            'lieu_activite' => 'required|string|max:255',
            'motif_activite' => 'nullable|string',
            'id_visiteur' => 'required|exists:visiteur,id_visiteur'
        ]);
    }

    protected function linkVisiteur($id_activite, $id_visiteur)
    {
        Realiser::updateOrCreate(
            ['id_activite_compl' => $id_activite],
            ['id_visiteur' => $id_visiteur]
        );
    }
}
