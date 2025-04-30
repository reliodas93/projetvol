<?php

class Reservation
{
    private $id_reservation;

    /**
     * @return mixed
     */
    public function getIdReservation()
    {
        return $this->id_reservation;
    }

    /**
     * @param mixed $id_reservation
     */
    public function setIdReservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;
    }

    private $ref_utilisateur;

    /**
     * @return mixed
     */
    public function getRefUtilisateur()
    {
        return $this->ref_utilisateur;
    }

    /**
     * @param mixed $ref_utilisateur
     */
    public function setRefUtilisateur($ref_utilisateur)
    {
        $this->ref_utilisateur = $ref_utilisateur;
    }

    private $ref_vol;

    /**
     * @return mixed
     */
    public function getRefVol()
    {
        return $this->ref_vol;
    }

    /**
     * @param mixed $ref_vol
     */
    public function setRefVol($ref_vol)
    {
        $this->ref_vol = $ref_vol;
    }

    private $prix_billet;

    /**
     * @return mixed
     */
    public function getPrixBillet()
    {
        return $this->prix_billet;
    }

    /**
     * @param mixed $prix_billet
     */
    public function setPrixBillet($prix_billet)
    {
        $this->prix_billet = $prix_billet;
    }

    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $valeur) {
            $methode = 'set' . ucfirst($key);

            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }
}

