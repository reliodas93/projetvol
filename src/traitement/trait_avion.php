<?php

require_once '../bdd/Bdd.php';
require_once '../../vue/ajoutAvion.html';
require_once '../modele/Avion.php';
require_once '../Repository/AvionRepository.php';
if (!empty($_POST["id_avion"]) && !empty($_POST["nom"]) && !empty($_POST["ref_modele"])) {

    $Avion = new Avion([
        'id_avion' => $_POST["id_avion"],
        'nom' => $_POST["nom"],
        'ref_modele' => $_POST["ref_modele"]
    ]);

    $avionRepository = new AvionRepository();

    try {
        $avionRepository->ajoutAvion($Avion);
        header("Location: ../../vue/AccueilEM.php");
        exit;
    } catch (Exception $e) {
        die('Erreur lors de l\'insertion en BDD : ' . $e->getMessage());
    }

} else {
    header("Location: ../../vue/ajoutAvion.php?error=champs_vides");
    exit;
}
?>