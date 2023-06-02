<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volontaire;

class VolontaireController extends Controller
{
    public function formcontact()
    {
        return view('home');
    }

    public function formcreate(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date' => 'required',
            'fonction' => 'required',
            'adresse' => 'required',
            'tel' => 'required|digits:10',
            'type' => 'required|in:Volontaire,Adherent',
            'email' => 'required'
            
        ]);

        $volontaire = new Volontaire();
        $volontaire->nom = $request->input('nom');
        $volontaire->prenom = $request->input('prenom');
        $volontaire->date = $request->input('date');
        $volontaire->fonction = $request->input('fonction');
        $volontaire->isadmin = $request->input('isadmin');
        $volontaire->adresse = $request->input('adresse');
        $volontaire->tel = $request->input('tel');
        $volontaire->type = $request->input('type');
        $volontaire->image = $request->input('image');
        $volontaire->email = $request->input('email');
      
        
        $volontaire->save();

         return redirect()->route('home')->with('success', 'Le formulaire a bien été envoyé.');
    }
}
