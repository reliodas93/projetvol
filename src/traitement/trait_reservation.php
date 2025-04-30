<?php
require_once '../bdd/Bdd.php';
require_once '../../vue/InscriptionEM.php';
require_once '../modele/Reservation.php';
require_once '../Repository/UtilisateurRepository.php';
require_once '../Repository/ReservationRepository.php';


if(empty($_POST["ref_vol"]) ||
    empty($_POST["ref_utilisateur"]) ||
    empty($_POST["prix_billet"])){
    echo "Veuillez remplir tous les champs";
    header("Location: ../../vue/reservation.html");
}else{
    // Création d'un objet Reservations
    $reservation = new Reservation([
        'ref_utilisateur' => $_POST['ref_utilisateur'],
        'ref_vol' => $_POST['ref_vol'],
        'prix_billet' => $_POST['prix_billet'],
    ]);
    // Initialisation du repository
    $reservationRepository = new ReservationRepository();

    // Appel de la méthode d'ajout de réservation
    $resultat = $reservationRepository->ajoutReservation($reservation);
    if($resultat == true){
        header("Location: ../../vue/AccueilEM.php");
    }else{
        header("Location: ../../vue/AjoutReservationEM.php");
    }

}



