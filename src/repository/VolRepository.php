<?php
class VolRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function ajoutVol(vol $vol)
    {
        $sql = "INSERT INTO vol(ville_depart,ville_arrive,date_depart,heure_depart,prix_billet_initiale,ref_pilote,ref_avion) VALUES (:ville_depart,:ville_arrive,:date_depart,:heure_depart,:prix_billet_initiale,:ref_pilote,:ref_avion)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'ville_depart' => $vol->getVilleDepart(),
            'ville_arrive' => $vol->getVilleArrive(),
            'date_depart' => $vol->getDateDepart(),
            'heure_depart' => $vol->getHeureDepart(),
            'prix_billet_initiale' => $vol->getPrixBilletInitiale(),
            'ref_pilote' => $vol->getRefPilote(),
            'ref_avion' => $vol->getRefAvion()

        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }

    }
    public function modifVol(vol $vol)
    {
        $sql = "UPDATE vol SET ville_depart = :ville_depart, ville_arrive = :ville_arrive,date_depart = :date_depart,heure_depart = :heure_depart,prix_billet_initiale = :prix_bilet_initiale,ref_pilote = :ref_pilote,ref_avion = :ref_avion WHERE id_vol = :id_vol";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'ville_depart' => $vol->getVilleDepart(),
            'ville_arrive' => $vol->getVilleArrive(),
            'date_depart' => $vol->getDateDepart(),
            'heure_depart' => $vol->getHeureDepart(),
            'prix_billet_initiale' => $vol->getPrixBilletInitiale(),
            'ref_pilote' => $vol->getRefPilote(),
            'ref_avion' => $vol->getRefAvion(),
        ));
        return $res;
    }
    public function suppVol(vol $vol)
    {
        $sql = "DELETE FROM vol WHERE ref_avion = :ref_avion";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute([
                'ref_avion' => $vol->getRefAvion()
            ]
        );
        return $res;
    }
}

