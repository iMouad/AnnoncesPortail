<?php

namespace App\Http\Controllers;

use Session;
use App\Models\annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AnnoncesController extends Controller
{
    // Fonction pour extraire et afficher les annonces du user connecté
    public function showview(Request $request) {
    
        // Extraire le id du user connecté
        $data = $request->session()->get('loginId');

        //on extrait les annonces approuvés du user qui s'est identifié
        $annonces = annonce::where('user_id', '=', $data)->where('confirmed','=',1)->where('is_deleted','=',0)->OrderBy('created_at','DESC')->get(); 
        $nbannonces = $annonces->count();
        // return the view
        return view('auth.annonces', compact('annonces','nbannonces'));
    }

    // Fonction pour afficher les annonces en attente
    public function showannoncesattente(Request $request) {
    
        // Extraire le id du user connecté
        $data = $request->session()->get('loginId');

        //on extrait les annonces non-approuvées du user qui s'est identifié
        $annonceattente = annonce::where('user_id', '=', $data)->where('confirmed','=',0)->where('is_deleted','=',0)->OrderBy('created_at','DESC')->get(); 
    
        // return the view
        return view('auth.annonceattente', compact('annonceattente'));
    }

    // Fonction pour que le user connecté ajoute une nouvelle annonce
    public function ajouter() {
        // return the view
        return view('auth.ajouterannonce');
    }
    
    

    public function store(Request $request) {
        // valider les données
        $request->validate([
           "title"=>"required",
           "desc"=>"required",
           "adresse"=>"required",
           "ville"=>"required",
           "images.*"=> "mimes:jpeg,jpg,png|max:10000"
        ]);
        
        /*Extraire l'image (Plus tard)
        if($request->hasfile('images')) {
            foreach($request->file('images') as $file)
            {
                $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
            }
            $fileModal = new annonce();
        
            $fileModal->image_path = json_encode($imgData);
        
           }else {
               $fileModal = NULL;
           } */
           
          
        // Extraire le id du user connecté
        $user_id=$request->session()->get('loginId');

        // Storer dans la base de données
        $annoncestored = annonce::create([
            "titre"=>$request->title,
            "desc"=>$request->desc,
            "adresse"=>$request->adresse,
            //"images"=>$fileModal,
            "user_id"=>$user_id,
            "confirmed"=>0,
            "ville"=>$request->ville
        ]);

        
        // Si l'annonce est ajouté on affiche une alerte avec un message de succès
        if ($annoncestored) {
            Alert::toast('Annonce ajouté avec succès, elle sera diffusée aprés approbation de l\'administrateur', 'info');
            return back();
        }else{
            Alert::toast('Une erreure s\'est produite veuillez réessayez', 'error');
            return back();
        }
    }




    // Fonction pour que le user connecté modifie une annonce
    public function edit(annonce $annonce) {
        $images = annonce::select('images')->where('id', '=', $annonce)->get();
        $json = json_decode($images,true);
        
        // return the view
        return view('auth.modifierannonce',compact('annonce','json'));
    }

    // Pour modifier une annonce
    public function update(Request $request, annonce $annonce) {
        // valider les données
        $request->validate([
           "title"=>"required",
           "desc"=>"required",
           "adresse"=>"required",
           "ville"=>"required",
           "images.*"=> "mimes:jpeg,jpg,png|max:2048"
        ]);
        

        // Extraire le id du user connecté
        $user_id=$request->session()->get('loginId');

        // Storer dans la base de données
        $annonceupdated = $annonce->update([
            "titre"=>$request->title,
            "desc"=>$request->desc,
            "adresse"=>$request->adresse,
            //"images"=>$fileModal,
            "user_id"=>$user_id,
            "confirmed"=>0,
            "ville"=>$request->ville
        ]);

        
        // Si l'annonce est modifié on affiche une alerte avec un message de succès
        if ($annonceupdated) {
            Alert::toast('Annonce modifiée avec succès, elle sera diffusée aprés approbation de l\'administrateur', 'info');
            return back();
        }else{
            Alert::toast('Une erreure s\'est produite veuillez réessayez', 'error');
            return back();
        }
    }
 

    

    public function delete (annonce $annonce) {
        $annoncedeleted = $annonce->update([
            "is_deleted"=>1
        ]);

        if($annoncedeleted) {
            Alert::toast('Annonce supprimée avec succès', 'success');
            return back();
        }
    }
    

}
