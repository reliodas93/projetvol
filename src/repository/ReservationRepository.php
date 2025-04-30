<?php
class reservationRepository

{private $bdd;
    public function __construct()
    {
        $this -> bdd =new bdd();
    }
    public function ajoutReservation(reservation $reservation)
    {
        $sql = "INSERT INTO reservation (ref_utilisateur,ref_vol,prix_billet) VALUES (:ref_utilisateur,:ref_vol,:prix_billet)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'ref_utilisateur' => $reservation->getRefUtilisateur(),
            'ref_vol' => $reservation->getRefVol(),
            'prix_billet' => $reservation->getPrixBillet()


        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }
    }
}