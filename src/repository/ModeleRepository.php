<?php
class modeleRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function ajoutModele(modele $modele)
    {
        $sql = "INSERT INTO modele(modele,marque) VALUES (:modele,:marque)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'modele' => $modele->getModele(),
            'marque' => $modele->getMarque()

        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }

    }

    public function modifModele(modele $modele)
    {
        $sql = "UPDATE modele SET modele = :modele,marque = :marque WHERE id_modele = :id_modele";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'modele' => $modele->getModele(),
            'marque' => $modele->getMarque(),


        ));
        return $res;
    }
}