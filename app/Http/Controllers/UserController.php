<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Models\connexion;



use Illuminate\Http\Request;

class UserController extends Controller
{
    public function formulaire()
    {
        return view('auth/connexion');
    }

    public function traitement()
    {
        return 'traitement formulaire connexion';
    }

 

    public function enregistrer(Request $request)
    {
    // Récupérez les données du formulaire à l'aide de la classe Request
    $email = $request->input('email');
    $password = $request->input('password');
    $signature = $request->input('signature');

    // Stockez le fichier de signature dans le répertoire "upload"
    if ($signature) {
        $folderPath = public_path('upload/');
        $image_parts = explode(';base64,', $signature);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename = uniqid() . '.' . $image_type;
        $file = $folderPath . $filename;
        file_put_contents($file, $image_base64);
    } else {
        // Gérez le cas où aucune signature n'a été fournie
        return response()->json(['error' => 'Aucune signature n\'a été fournie.']);
    }

    // Utilisez Eloquent pour créer un nouvel enregistrement dans la base de données
    $connexion = new Connexion;
    $connexion->email = $email;
    $connexion->password = $password;
    $connexion->signature = $filename; // Stockez le nom du fichier de signature
    $connexion->save();

    return response()->json(['message' => 'Données enregistrées avec succès.']);
}




}
