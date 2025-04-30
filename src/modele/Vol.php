<?php

class Vol
{
    private $id_vol;

    /**
     * @return mixed
     */
    public function getIdVol()
    {
        return $this->id_vol;
    }

    /**
     * @param mixed $id_vol
     */
    public function setIdvol($id_vol)
    {
        $this->id_vol = $id_vol;
    }

    private $ville_depart;

    /**
     * @return mixed
     */
    public function getVilleDepart()
    {
        return $this->ville_depart;
    }

    /**
     * @param mixed $ville_depart
     */
    public function setVilleDepart($ville_depart)
    {
        $this->ville_depart = $ville_depart;
    }

    private $ville_arrive;

    /**
     * @return mixed
     */
    public function getVilleArrive()
    {
        return $this->ville_arrive;
    }

    /**
     * @param mixed $ville_arrive
     */
    public function setVilleArrive($ville_arrive)
    {
        $this->ville_arrive = $ville_arrive;
    }

    private $date_depart;

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->date_depart;
    }

    /**
     * @param mixed $date_depart
     */
    public function setDateDepart($date_depart)
    {
        $this->date_depart = $date_depart;
    }

    private $heure_depart;

    /**
     * @return mixed
     */
    public function getHeureDepart()
    {
        return $this->heure_depart;
    }

    /**
     * @param mixed $heure_depart
     */
    public function setHeureDepart($heure_depart)
    {
        $this->heure_depart = $heure_depart;
    }

    private $prix_billet_initiale;

    /**
     * @return mixed
     */
    public function getPrixBilletInitiale()
    {
        return $this->prix_billet_initiale;
    }

    /**
     * @param mixed $prix_billet_initiale
     */
    public function setPrixBilletInitiale($prix_billet_initiale)
    {
        $this->prix_billet_initiale = $prix_billet_initiale;
    }

    private $ref_pilote;

    /**
     * @return mixed
     */
    public function getRefPilote()
    {
        return $this->ref_pilote;
    }

    /**
     * @param mixed $ref_pilote
     */
    public function setRefPilote($ref_pilote)
    {
        $this->ref_pilote = $ref_pilote;
    }

    private $ref_avion;

    /**
     * @return mixed
     */
    public function getRefAvion()
    {
        return $this->ref_avion;
    }

    /**
     * @param mixed $ref_avion
     */
    public function setRefAvion($ref_avion)
    {
        $this->ref_avion = $ref_avion;
    }
    public function __construct(array $donnee){
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $valeur)
        {
            $methode = 'set'.ucfirst($key);

            if (method_exists($this, $methode))
            {
                $this->$methode($valeur);
            }
        }
    }
}

