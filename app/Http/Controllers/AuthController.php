<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use App\Models\annonce;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // Login view function
    public function login () {
        return view('auth.login');
    }

    // Registration view function
    public function registration () {
        return view('auth.inscription');
    }

    // Validate and insert inscription inputs
    public function registerUser (Request $request) {
        $request ->validate([
            'name' => 'required',
            'birthday' => 'required',
            'mail' => 'required|unique:users',
            'password' => 'required|min:6|max:30'
        ]);

        $user = new User();
    $user-> name = $request->name;
    $user-> birthday = $request->birthday;
    $user-> phone = $request->phone;
    $user-> mail = $request->mail;
    $user-> password = Hash::make($request->password);
    $res = $user->save(); 
    if ($res) {
        Alert::toast('Vous êtes inscrit avec succès, connectez-vous avec votre email et mot de passe', 'success');
        return back();
    }else {
        Alert::toast('Une erreure s\'est produite veuillez réessayez', 'error');
        return back();
    }

    }

       // Login validate and authentification
    public function userLogin (Request $request) {
        $request ->validate([
            'mail' => 'required|email',
            'password' => 'required|min:6|max:30'
        ]);
          
        // Extracting the mail from the table
        $user = User::where('mail', '=',$request->mail)->first();

        // Verfying the mail and password
        if ($user) {
           if(Hash::check($request->password,$user->password)) {
              $request->session()->put('loginId',$user->id);  //Creating the session
               return redirect('dashboard');
           }else {
            return back()->with('fail','Mot de passe incorrect');
           }
        }else {
            return back()->with('fail','Email inexistant vérifier une autre fois');
        }
    }

    // Dashboard funtion (needs modifications)
    public function dashboard(Request $request) {
        $data = array();
        
        
           
        // Vérifer si la session existe
        if(Session::has('loginId')) {
            $data = User::where('id', '=',Session::get('loginId'))->first(); //Si elle existe on extrait les données du user qui s'est identifié
        }

        // Extraire le id du user connecté
        $userid = $request->session()->get('loginId');

        //Pour extraire le nombre total d'annonces
        $annoncestotal = annonce::where('user_id', '=', $userid)->where('is_deleted','=',0)->OrderBy('created_at','DESC')->get(); 
        $nbannoncestotal = $annoncestotal->count();
        
        //Extraire les annonces en attente
        $annoncespending = annonce::where('user_id', '=', $userid)->where('confirmed','=',0)->where('is_deleted','=',0)->OrderBy('created_at','DESC')->get();
        $nbannoncespending = $annoncespending->count();
        
        //Extraire les annonces approuvées
        $annoncesapproved = annonce::where('user_id', '=', $userid)->where('confirmed','=',1)->where('is_deleted','=',0)->OrderBy('created_at','DESC')->get();
        $nbannoncesapproved = $annoncesapproved->count();
        
        

        return view('auth.dashboard', compact('data','nbannoncestotal','nbannoncespending','nbannoncesapproved')) ; //Return view et compact avec elle data pour l'utiliser dans le view
    }

    //Logout function (Se déconnecter)
    public function logout() {
        if(Session::has('loginId')) { //Vérifier si la session existe
            Session::pull('loginId'); //Finir la session
            return redirect('login'); //Redériger vers la page de login
        }
    }

    // profile funtion (needs modifications)
    public function profile(Request $request,User $user) {

        // Extraire le id du user connecté
        $userid = $request->session()->get('loginId');
        
        // Mettre les données du user connecté dans le variable pour l'utiliser en Blade
        $userdata = User::where('id', '=', $userid)->first();

        //Extraire les annonces en attente
        $annoncespending = annonce::where('user_id', '=', $userid)->where('confirmed','=',0)->where('is_deleted','=',0)->OrderBy('created_at','DESC')->get();
        $nbannoncespending = $annoncespending->count();
        
        //Extraire les annonces approuvées
        $annoncesapproved = annonce::where('user_id', '=', $userid)->where('confirmed','=',1)->where('is_deleted','=',0)->OrderBy('created_at','DESC')->get();
        $nbannoncesapproved = $annoncesapproved->count();

        return view('auth.profile', compact('userdata','nbannoncesapproved','nbannoncespending')) ; //Return view et compact avec elle data pour l'utiliser dans le view
    }


    // Modifier le profil
    public function update(Request $request, User $user) {
         
        $userid = $request->session()->get('loginId');

        //Valider les données
        $request->validate([
            "profile_name"=>"required",
            "profile_email"=>"required",
            "profile_password"=>"required",
            "profile_phone"=>"required"
         ]);

         $userupdated = User::where('id', $userid)->update([
            "name"=>$request->profile_name,
            "phone"=>$request->profile_phone,
            "mail"=>$request->profile_email,
            "password"=>Hash::make($request->profile_password)
        ]);

        // Si l'annonce est modifié on affiche une alerte avec un message de succès
        if ($userupdated) {
            Alert::toast('Profil modifiée avec succès', 'success');
            return back();
        }else{
            Alert::toast('Une erreure s\'est produite veuillez réessayez', 'error');
            return back();
        }
           
    }

}
