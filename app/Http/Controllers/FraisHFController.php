<?php
namespace App\Http\Controllers;

use app\dao\ServiceFrais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceFraisHF;
use App\Models\FraisHF;
use Exception;

class FraisHFController extends Controller{
    public function getFraisHF(){
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $id = Session::get('id');
            $serviceFraisHF = new ServiceFraisHF();
            $mesFraisHF = $serviceFraisHF->getFraisHF($id);
            $total = 0;
            foreach ($mesFraisHF as $valeur){
                $total += $valeur->montant_fraishorsforfait;
            }
            return view('vues/listeFraisHF', compact('mesFraisHF','total','erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function updateFraisHF($id_frais)
    {
        $erreur = "";
        try {
            $serviceFraisHF = new ServiceFraisHF();
            $unFraisHF = $serviceFraisHF->getByIdHF($id_frais);
            $titreVue = "Modification d'une fiche de frais";
            return view('vues/formFraisHF', compact('unFraisHF', 'titreVue','erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function validateFrais(Request $request){
        $erreur = "";
        try {
            $id_frais = $request->input('id_frais');
            $date_fraishorsforfait = $request->input('date_fraishorsforfait');
            $lib_fraishorsforfait = $request->input('lib_fraishorsforfait');
            $serviceFraisHF = new ServiceFraisHF();
            if ($id_frais >0) {
                $serviceFraisHF ->updateFraisHF($id_frais, $date_fraishorsforfait, $lib_fraishorsforfait);
            }else{
                $id_visiteur = Session::get('id');
                $serviceFraisHF->insertFrais($id_visiteur, $date_fraishorsforfait,$lib_fraishorsforfait);
            }
            return redirect('/getListeFrais');
        }catch (Exception $e) {
            $erreur=$e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
}
