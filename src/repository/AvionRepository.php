<?php

class AvionRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function ajoutAvion(avion $avion)
    {
        $sql = "INSERT INTO avion(nom,ref_modele) VALUES (:nom,:ref_modele)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'nom' => $avion->getNom(),
            'ref_modele' => $avion->getRefModele(),

        ));
        if ($res) {
            return true;
        } else {
            // Si la requête échoue, vous pouvez ajouter une gestion d'erreur ici
            $errorInfo = $req->errorInfo();
            // Vous pouvez loguer l'erreur ou afficher un message spécifique
            return false;
        }
    }

    public function modifAvion(avion $avion)
    {
        $sql = "UPDATE avion SET nom = :nom, ref_modele = :ref_modele WHERE id_avion = :id_avion";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'id_avion' => $avion->getIdAvion(),
            'nom' => $avion->getNom(),
            'ref_modele' => $avion->getRefModele(),

        ));
        return $res;
    }
}
