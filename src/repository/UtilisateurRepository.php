<?php



class UtilisateursRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function ajoutUtilisateurs(Utilisateurs $utilisateurs)
    {
        $sql = "INSERT INTO utilisateurs(nom,prenom,email,mot_de_passe,date_de_naissance,ville_de_naissance) VALUES (:nom,:prenom,:email,:mot_de_passe,:date_de_naissance,:ville_de_naissance)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'nom' => $utilisateurs->getNom(),
            'prenom' => $utilisateurs->getPrenom(),
            'email' => $utilisateurs->getemail(),
            'mot_de_passe' => $utilisateurs->getMotDePasse(),
            'date_de_naissance' => $utilisateurs->getDateDeNaissance(),
            'ville_de_naissance' => $utilisateurs->getVilleDeNaissance(),
        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }

    }


    public function connexionUtilisateurs(Utilisateurs $utilisateurs)
    {
        $sql = "SELECT * FROM utilisateurs WHERE email = :email"; // Assurez-vous qu'il y a seulement 1 paramètre
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute([
            ':email' => $utilisateurs->getEmail() // Bien utiliser ':' devant le nom du paramètre
        ]);

        $res = $req->fetch(PDO::FETCH_ASSOC);

        if (!$res) {
            return null; // Aucun utilisateur trouvé
        }

        // Vérification du mot de passe hashé avec password_verify()
        if (!password_verify($utilisateurs->getMotDePasse(), $res['mot_de_passe'])) {
            return null; // Mot de passe incorrect
        }

        // Remplissage de l'objet utilisateur
        $utilisateurs->setIdUtilisateur($res['id_utilisateur']);
        $utilisateurs->setNom($res['nom']);
        $utilisateurs->setPrenom($res['prenom']);
        $utilisateurs->setEmail($res['email']);
        $utilisateurs->setDateDeNaissance($res['date_de_naissance']);
        $utilisateurs->setVilleDeNaissance($res['ville_de_naissance']);
        $utilisateurs->setRole($res['role']);

        return $utilisateurs;
    }
}