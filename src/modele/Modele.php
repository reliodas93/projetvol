<?php
class Modele
{
    private $id_modele;

    /**
     * @return mixed
     */
    public function getIdModele()
    {
        return $this->id_modele;
    }

    /**
     * @param mixed $id_modele
     */
    public function setIdModele($id_modele)
    {
        $this->id_modele = $id_modele;
    }

    private $modele;

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param mixed $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    private $marque;

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
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
