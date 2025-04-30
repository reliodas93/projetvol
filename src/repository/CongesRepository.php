<?php

class CongesRepository

{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new bdd();
    }

    public function ajoutConges(conges $conges)
    {
        $sql = "INSERT INTO modele(date_debut,date_fin,est_valide,ref_pilote,ref_validation_admin) VALUES (:date_debut,:date_fin,:est_valide,:ref_validation_admin)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'date_debut' => $conges->getDateDebut(),
            'date_fin' => $conges->getDateFin(),
            'est_valide' => $conges->getEstValide(),
            'ref_pilote' => $conges->getRefPilote(),
            'ref_validation_admin' => $conges->getRefValidationAdmin()

        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }
}
