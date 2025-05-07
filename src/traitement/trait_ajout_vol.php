<?php
require_once '../bdd/Bdd.php';
require_once  '../../vue/ajoutVolEM.html';
require_once '../modele/Vol.php';
require_once '../Repository/VolRepository.php';




if(empty($_POST["ville_depart"]) ||
    empty($_POST["ville_arrive"]) ||
    empty($_POST["date_depart"]) ||
    empty($_POST["heure_depart"]) ||
    empty($_POST["prix_billet_initiale"]) ||
    empty($_POST["ref_pilote"]) ||
    empty($_POST["ref_avion"])){

    echo "C'est pas bien ...";
    header("Location: ../../vue/AjoutFilmEM.php");
}else{
    $vol = new Vol([
        'ville_depart' => $_POST['ville_depart'],
        'ville_arrive' => $_POST["ville_arrive"],
        'date_depart' =>$_POST["date_depart"],
        'heure_depart' => $_POST["heure_depart"],
        'prix_billet_initiale' => $_POST["prix_billet_initiale"],
        'ref_pilote' => $_POST["ref_pilote"],
        'ref_avion' => $_POST["ref_avion"],
    ]);
    $VolRepository = new VolRepository();
    $resultat = $VolRepository->ajoutVol($vol);

    if($resultat == true){
        header("Location: ../../vue/AccueilEM.php");
    }else{
        header("Location: ../../vue/AjoutVolEM.php");
    }

}
