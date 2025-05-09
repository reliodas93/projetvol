<?php


use modele\Utilisateurs;

require_once '../bdd/Bdd.php';
require_once '../modele/Utilisateur.php';
require_once '../Repository/UtilisateurRepository.php';

if (empty($_POST["nom"]) ||
    empty($_POST["prenom"]) ||
    empty($_POST["mot_de_passe"])) {
    header("Location: ../../vue/Connexion.php");
} else {
    $utilisateurs = new Utilisateurs([
    $utilisateurs->setNom($_POST["nom"],
    $utilisateurs->setPrenom($_POST["prenom"],
    $utilisateurs->setMotDePasse($_POST["mot_de_passe"],

    $utilisateurRepository = new UtilisateurRepository();
    $resultat = $utilisateurRepository->modifUtilisateurs($utilisateurs);

    if ($resultat == true) {
        header("Location: ../vue/ConnexionEM.php");
    } else {
        header("Location: ../vue/Modification.php");
    }

}

