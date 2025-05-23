<?php

require_once '../bdd/Bdd.php';
require_once '../../vue/ConnexionEM.php';
require_once '../modele/Utilisateur.php';
require_once '../repository/UtilisateurRepository.php';

if (!isset($_POST["email"]) || !isset($_POST["mot_de_passe"]) || empty($_POST["email"]) || empty($_POST["mot_de_passe"])) {
    echo "C'est pas bien, vous avez laissé une case vide";
    header("Location: ../../vue/ConnexionEM.php");
    exit();
} else {
    $utilisateur = new Utilisateur([
        'email' => $_POST["email"],
        'motDePasse' => $_POST["mot_de_passe"]
    ]);

    $email = $_POST["email"];
    $motDePasse = $_POST["mot_de_passe"];

    $utilisateurRepository = new UtilisateurRepository();
    $resultat = $utilisateurRepository->connexionUtilisateur($utilisateur);

    if ($resultat) {
        session_start();

        $_SESSION['id_utilisateur'] = $utilisateur->getIdUtilisateur();
        $_SESSION['nom'] = $utilisateur->getNom();
        $_SESSION['prenom'] = $utilisateur->getPrenom();
        $_SESSION['email'] = $utilisateur->getemail();
        $_SESSION['motDePasse'] = $utilisateur->getMotDePasse();
        $_SESSION['date_naissance'] = $utilisateur->getDateNaissance();

        header("Location: ../../vue/AccueilEM.php");
        exit();
    } else {

        session_destroy();
        header("Location: ../../vue/ConnexionEM.php");
        exit();
    }
}