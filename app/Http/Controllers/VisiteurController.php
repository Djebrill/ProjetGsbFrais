<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceVisiteur;
use Exception;

class VisiteurController extends Controller
{
    public function getLogin()
    {
        $erreur = "";
        try {
            return view('vues/formLogin', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }
    }

    public function signIn(Request $request)
    {
        $erreur = "";
        try {
            $login = $request->input('login');
            $pwd = $request->input('pwd');
            $serviceVisiteur = new ServiceVisiteur();
            $connected = $serviceVisiteur->login($login, $pwd);

            if ($connected) {
                Session::put('login', $login);
                if (Session::get('type') == 'P') {
                    return view('vues/homePraticien', compact('login'));
                } else {
                    return view('home', compact('login'));
                }
            } else {
                $erreur = "Login ou mot de passe inconnu";
                return view('vues/formLogin', compact('erreur'));
            }
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }
    }


    public function signOut()
    {
        $serviceVisiteur = new ServiceVisiteur();
        $serviceVisiteur->logout();
        return redirect('/');
    }

    public function index()
    {
        $serviceVisiteur = new ServiceVisiteur();
        $visiteurs = $serviceVisiteur->search();
        $erreur = "";
        try {
            return view('vues/Rechercher', compact('visiteurs'));
        } catch (Exception $e) {
            $erreur = "Une erreur s'est produite lors de la recherche : " . $e->getMessage();
            return redirect()->route('vues/Rechercher')->withErrors(['erreur' => $erreur]);
        }
    }

}
