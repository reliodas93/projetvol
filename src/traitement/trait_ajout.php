<?php
require_once '../bdd/Bdd.php';
require_once '../../vue/InscriptionEM.php';
require_once '../modele/Utilisateur.php';
require_once '../Repository/UtilisateurRepository.php';

if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["email"]) || empty($_POST["mot_de_passe"])|| empty($_POST["date_naissance"])) {
    echo "C'est pas bien ...";
    header("Location: ../../vue/InscriptionEM.php");
    exit();
} else {
    $utilisateur = new Utilisateur([
        'nom' => $_POST['nom'],
        'prenom' => $_POST["prenom"],
        'email' => $_POST['email'],
        'motDePasse' => password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT),
        'dateNaissance'=>$_POST['date_naissance'],
        'role' => "Client",
    ]);

    $UtilisateurRepository = new UtilisateurRepository();
    $resultat = $UtilisateurRepository->ajoutUtilisateur($utilisateur);

    if ($resultat) {
        header("Location: ../../vue/ConnexionEM.php");
    } else {
        header("Location: ../../vue/InscriptionEM.php");
    }
}
?>