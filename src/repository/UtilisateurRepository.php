<?php



class UtilisateurRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function ajoutUtilisateur(utilisateur $utilisateur)
    {
        $sql = "INSERT INTO utilisateur(nom,prenom,email,mot_de_passe,date_naissance) VALUES (:nom,:prenom,:email,:mot_de_passe,:date_naissance)";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'email' => $utilisateur->getemail(),
            'mot_de_passe' => $utilisateur->getMotDePasse(),
            'date_naissance' => $utilisateur->getDateNaissance(),

        ));
        if ($res == true) {
            return true;
        } else {
            return false;
        }

    }


    public function connexionUtilisateur(utilisateur $utilisateur)
    {
        $sql = "SELECT * FROM utilisateur WHERE email = :email"; // Assurez-vous qu'il y a seulement 1 paramètre
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute([
            ':email' => $utilisateur->getEmail() // Bien utiliser ':' devant le nom du paramètre
        ]);

        $res = $req->fetch(PDO::FETCH_ASSOC);

        if (!$res) {
            return null; // Aucun utilisateur trouvé
        }

        // Vérification du mot de passe hashé avec password_verify()
        if (!password_verify($utilisateur->getMotDePasse(), $res['mot_de_passe'])) {
            return null; // Mot de passe incorrect
        }

        // Remplissage de l'objet utilisateur
        $utilisateur->setIdUtilisateur($res['id_utilisateur']);
        $utilisateur->setNom($res['nom']);
        $utilisateur->setPrenom($res['prenom']);
        $utilisateur->setEmail($res['email']);
        $utilisateur->setDateNaissance($res['date_naissance']);
        $utilisateur->setRole($res['role']);

        return $utilisateur;
    }

    public function modifUtilisateurs(Utilisateurs $utilisateurs)
    {
        $sql = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, mot_de_passe = :mot_de_passe WHERE id_utilisateur = :id_utilisateur";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute(array(
            'nom' => $utilisateurs->getNom(),
            'prenom' => $utilisateurs->getPrenom(),
            'mot_de_passe' => $utilisateurs->getMotDePasse(),
            'id_utilisateur' => $utilisateurs->getIdUtilisateur()
        ));
        return $res;
    }

    public function suppUtilisateurs(Utilisateurs $utilisateurs)
    {
        $sql = "DELETE FROM utilisateurs WHERE email = :email";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute([
                'email' => $utilisateurs->getEmail()
            ]
        );
        return $res;
    }
    public function suppUtilisateursAdmin($id_utilisateur){
        $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
        $req = $this->bdd->getBdd()->prepare($sql);
        $res = $req->execute([
            'id_utilisateur' => $id_utilisateur
        ]);

        return $res; // Retourne vrai ou faux selon le succès de la suppression
    }
}