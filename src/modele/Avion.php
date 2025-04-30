<?php
Class Avion{
    private $id_avion;

    /**
     * @return mixed
     */
    public function getIdAvion()
    {
        return $this->id_avion;
    }

    /**
     * @param mixed $id_avion
     */
    public function setIdAvion($id_avion)
    {
        $this->id_avion = $id_avion;
    }
    private $nom;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    private $ref_modele;

    /**
     * @return mixed
     */
    public function getRefModele()
    {
        return $this->ref_modele;
    }

    /**
     * @param mixed $ref_modele
     */
    public function setRefModele($ref_modele)
    {
        $this->ref_modele = $ref_modele;
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
