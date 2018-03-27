<?php

/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/11/17
 * Time: 4:54 AM
 */

require_once 'Configuration.php';
class Eleve
{
    private  $nom;
    private $postnom;
    private $classe;
    private $matricule;
    private $adresse;
    private $pere;
    private $mere;
    private $tuteur;
    private $section;
    private $telephone;

    /**
     * Eleve constructor.
     * @param $nom
     * @param $postnom
     * @param $classe
     * @param $matricule
     * @param $adresse
     * @param $pere
     * @param $mere
     * @param $tuteur
     * @param $section
     * @param $telephone
     */
    public function __construct($nom, $postnom, $classe, $matricule, $adresse, $pere, $mere, $tuteur, $section, $telephone)
    {
        $this->nom = $nom;
        $this->postnom = $postnom;
        $this->classe = $classe;
        $this->matricule = $matricule;
        $this->adresse = $adresse;
        $this->pere = $pere;
        $this->mere = $mere;
        $this->tuteur = $tuteur;
        $this->section = $section;
        $this->telephone = $telephone;
    }

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

    /**
     * @return mixed
     */
    public function getPostnom()
    {
        return $this->postnom;
    }

    /**
     * @param mixed $postnom
     */
    public function setPostnom($postnom)
    {
        $this->postnom = $postnom;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getPere()
    {
        return $this->pere;
    }

    /**
     * @param mixed $pere
     */
    public function setPere($pere)
    {
        $this->pere = $pere;
    }

    /**
     * @return mixed
     */
    public function getMere()
    {
        return $this->mere;
    }

    /**
     * @param mixed $mere
     */
    public function setMere($mere)
    {
        $this->mere = $mere;
    }

    /**
     * @return mixed
     */
    public function getTuteur()
    {
        return $this->tuteur;
    }

    /**
     * @param mixed $tuteur
     */
    public function setTuteur($tuteur)
    {
        $this->tuteur = $tuteur;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public static function afficheeleveparmatricule($matricule)
    {
        $connexion=Configuration::getConnexion();
        $tableau=array();
        $sql="select * from eleve where matriculeeleve='".$matricule."'";
        if($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {

                $tableau[]=new Eleve(
                    $objet->nomeleve,
                    $objet->postnomeleve,
                    $objet->classeeleve,
                    $objet->matriculeeleve,
                    $objet->adresseeleve,
                    $objet->pereeleve,
                    $objet->mereeleve,
                    $objet->tuteureleve,
                    $objet->sectioneleve,
                    $objet->telephoneeleve);

            }

        }
        return $tableau;
    }

    public static function afficheclasse()
    {
        $connexion=Configuration::getConnexion();
        $tableau=array();
        $sql="select * from eleve  GROUP BY classeeleve";
        if($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {

                $tableau[]=new Eleve(
                    $objet->nomeleve,
                    $objet->postnomeleve,
                    $objet->classeeleve,
                    $objet->matriculeeleve,
                    $objet->adresseeleve,
                    $objet->pereeleve,
                    $objet->mereeleve,
                    $objet->tuteureleve,
                    $objet->sectioneleve,
                    $objet->telephoneeleve);

            }

        }
        return $tableau;
    }

    public static function totaleleve()
    {
        $connexion=Configuration::getConnexion();
        $nb=null;
        $sql="select count(*) as elevetotal from eleve ";
        if($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($object = $requete->fetch()) {
                $nb = $object['elevetotal'];
            }


        }
        return $nb;

    }
}