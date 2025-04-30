<?php

class Conges
{
    private $id_conges;

    /**
     * @return mixed
     */
    public function getIdConges()
    {
        return $this->id_conges;
    }

    /**
     * @param mixed $id_conges
     */
    public function setIdConges($id_conges)
    {
        $this->id_conges = $id_conges;
    }

    private $date_debut;

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @param mixed $date_debut
     */
    public function setDateDebut($date_debut)
    {
        $this->date_debut = $date_debut;
    }

    private $date_fin;

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     */
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

    private $est_valide;

    /**
     * @return mixed
     */
    public function getEstValide()
    {
        return $this->est_valide;
    }

    /**
     * @param mixed $est_valide
     */
    public function setEstValide($est_valide)
    {
        $this->est_valide = $est_valide;
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

    private $ref_validation_admin;

    /**
     * @return mixed
     */
    public function getRefValidationAdmin()
    {
        return $this->ref_validation_admin;
    }

    /**
     * @param mixed $ref_validation_admin
     */
    public function setRefValidationAdmin($ref_validation_admin)
    {
        $this->ref_validation_admin = $ref_validation_admin;
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