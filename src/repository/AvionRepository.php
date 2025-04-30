<?php

class avionRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function ajoutAvion(avion $avion)
    {
        $sql = "INSERT INTO utilisateur(nom,ref_modele) VALUES (:nom,:ref_modele)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'nom' => $avion->getNom(),
            'ref_modele' => $avion->getRefModele(),

        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }

    }
    public function modifAvion(avion $avion)
    {
        $sql = "UPDATE avion SET nom = :nom, ref_modele = :ref_modele WHERE id_avion = :id_avion";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'nom' => $avion->getNom(),
            'ref_modele' => $avion->getRefModele(),

        ));
        return $res;
    }
}
