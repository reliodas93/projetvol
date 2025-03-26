<?php
require_once '../bdd/Bdd.php';
require_once '../../vue/InscriptionEM.php';
require_once '../modele/Utilisateur.php';
require_once '../Repository/UtilisateurRepository.php';

if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["email"]) || empty($_POST["mot_de_passe"])|| empty($_POST["date_de_naissance"])|| empty($_POST["ville_de_naissance"])) {
    echo "C'est pas bien ...";
    header("Location: ../../vue/InscriptionEM.php");
    exit();
} else {
    $utilisateurs = new Utilisateurs([
        'nom' => $_POST['nom'],
        'prenom' => $_POST["prenom"],
        'email' => $_POST['email'],
        'motDePasse' => password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT),
        'dateDeNaissance'=>$_POST['date_de_naissance'],
        'villeDeNaissance'=>$_POST['ville_de_naissance'],
        'role' => "Client",
    ]);

    $UtilisateursRepository = new UtilisateursRepository();
    $resultat = $UtilisateursRepository->ajoutUtilisateurs($utilisateurs);

    if ($resultat) {
        header("Location: ../../vue/ConnexionEM.php");
    } else {
        header("Location: ../../vue/InscriptionEM.php");
    }
}
?>