<?php

/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/11/17
 * Time: 4:55 AM
 */
require_once 'Configuration.php';
class Gerant
{
    private $idgerant;
    private $nomgerant;
    private $postnomgerant;
    private $matriculegerant;
    private $typegerant;
    private $motdepassegerant;

    /**
     * Gerant constructor.
     * @param $idgerant
     * @param $nomgerant
     * @param $postnomgerant
     * @param $matriculegerant
     * @param $typegerant
     * @param $motdepassegerant
     */
    public function __construct($idgerant, $nomgerant, $postnomgerant, $matriculegerant, $typegerant, $motdepassegerant)
    {
        $this->idgerant = $idgerant;
        $this->nomgerant = $nomgerant;
        $this->postnomgerant = $postnomgerant;
        $this->matriculegerant = $matriculegerant;
        $this->typegerant = $typegerant;
        $this->motdepassegerant = $motdepassegerant;
    }

    /**
     * @return mixed
     */
    public function getIdgerant()
    {
        return $this->idgerant;
    }

    /**
     * @param mixed $idgerant
     */
    public function setIdgerant($idgerant)
    {
        $this->idgerant = $idgerant;
    }

    /**
     * @return mixed
     */
    public function getNomgerant()
    {
        return $this->nomgerant;
    }

    /**
     * @param mixed $nomgerant
     */
    public function setNomgerant($nomgerant)
    {
        $this->nomgerant = $nomgerant;
    }

    /**
     * @return mixed
     */
    public function getPostnomgerant()
    {
        return $this->postnomgerant;
    }

    /**
     * @param mixed $postnomgerant
     */
    public function setPostnomgerant($postnomgerant)
    {
        $this->postnomgerant = $postnomgerant;
    }

    /**
     * @return mixed
     */
    public function getMatriculegerant()
    {
        return $this->matriculegerant;
    }

    /**
     * @param mixed $matriculegerant
     */
    public function setMatriculegerant($matriculegerant)
    {
        $this->matriculegerant = $matriculegerant;
    }

    /**
     * @return mixed
     */
    public function getTypegerant()
    {
        return $this->typegerant;
    }

    /**
     * @param mixed $typegerant
     */
    public function setTypegerant($typegerant)
    {
        $this->typegerant = $typegerant;
    }

    /**
     * @return mixed
     */
    public function getMotdepassegerant()
    {
        return $this->motdepassegerant;
    }

    /**
     * @param mixed $motdepassegerant
     */
    public function setMotdepassegerant($motdepassegerant)
    {
        $this->motdepassegerant = $motdepassegerant;
    }

    public static function login($matricule,$motdepasse)
    {
        $connexion=Configuration::getConnexion();
        $tableau=array();
        $sql="select * from gerant WHERE (matriculegerant='".$matricule."' AND motdepassegerant='".$motdepasse."')";
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {
                $tableau[]=new Gerant(

                    $objet->idgerant,
                    $objet->nomgerant,
                    $objet->postnomgerant,
                    $objet->matriculegerant,
                    $objet->typegerant,
                    $objet->motdepassegerant

                );
            }
        }
        return $tableau;
    }
    public static function modifiergerant($idgerant,Gerant $gerant)
    {
        $connexion=Configuration::getConnexion();
        $sql="update gerant set nomgerant='".$gerant->getNomgerant()."',postnomgerant='".$gerant->getPostnomgerant()."',matriculegerant='".$gerant->getMatriculegerant()."',typegerant='".$gerant->getTypegerant()."',motdepassegerant='".$gerant->getMotdepassegerant()."'";
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
        }
    }
    public static function ajoutgerant(Gerant $gerant)
    {
        $connexion=Configuration::getConnexion();
        $sql="insert into gerant(nomgerant,postnomgerant,matriculegerant,typegerant,motdepassegerant) values('".$gerant->getNomgerant()."','".$gerant->getPostnomgerant()."','".$gerant->getMatriculegerant()."','".$gerant->getTypegerant()."','".$gerant->getMotdepassegerant()."')";
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
        }

    }


}