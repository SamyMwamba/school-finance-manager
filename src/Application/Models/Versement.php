<?php

/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/11/17
 * Time: 4:55 AM
 */
require_once '../Model/Configuration.php';
class Versement
{
    private $idvers;
    private $motifvers;
    private $datevers;
    private $montantvers;
    private $nomvers;
    private $typevers;

    /**
     * Versement constructor.
     * @param $idvers
     * @param $motifvers
     * @param $datevers
     * @param $montantvers
     * @param $nomvers
     * @param $typevers
     */
    public function __construct($idvers, $motifvers, $datevers, $montantvers, $nomvers, $typevers)
    {
        $this->idvers = $idvers;
        $this->motifvers = $motifvers;
        $this->datevers = $datevers;
        $this->montantvers = $montantvers;
        $this->nomvers = $nomvers;
        $this->typevers = $typevers;
    }


    /**
     * @return mixed
     */
    public function getTypevers()
    {
        return $this->typevers;
    }

    /**
     * @param mixed $typevers
     */
    public function setTypevers($typevers)
    {
        $this->typevers = $typevers;
    }


    /**
     * @return mixed
     */
    public function getIdvers()
    {
        return $this->idvers;
    }

    /**
     * @param mixed $idvers
     */
    public function setIdvers($idvers)
    {
        $this->idvers = $idvers;
    }

    /**
     * @return mixed
     */
    public function getMotifvers()
    {
        return $this->motifvers;
    }

    /**
     * @param mixed $motifvers
     */
    public function setMotifvers($motifvers)
    {
        $this->motifvers = $motifvers;
    }

    /**
     * @return mixed
     */
    public function getDatevers()
    {
        return $this->datevers;
    }

    /**
     * @param mixed $datevers
     */
    public function setDatevers($datevers)
    {
        $this->datevers = $datevers;
    }

    /**
     * @return mixed
     */
    public function getMontantvers()
    {
        return $this->montantvers;
    }

    /**
     * @param mixed $montantvers
     */
    public function setMontantvers($montantvers)
    {
        $this->montantvers = $montantvers;
    }

    /**
     * @return mixed
     */
    public function getNomvers()
    {
        return $this->nomvers;
    }

    /**
     * @param mixed $nomvers
     */
    public function setNomvers($nomvers)
    {
        $this->nomvers = $nomvers;
    }

    public static function ajoutvers(Versement $versement)
    {
        $connexion=Configuration::getConnexion();
        $bool=false;

        $sql="INSERT INTO `versementdivers` (`idversement`, `motifversement`, `dateversement`, `montantversement`, `nomversant`, `typeversement`)
            VALUES (NULL, '".$versement->getMontantvers()."', '".$versement->getDatevers()."', '".$versement->getMontantvers()."', '".$versement->getNomvers()."', '".$versement->getTypevers()."')";

        if ($connexion!=null)
        {
            try {
                $requete = $connexion->prepare($sql);
                $requete->execute();
                $bool=true;

            }catch (Exception $exception)
            {
                die($exception->getMessage());
            }
        }
        return $bool;
    }

    public static function afficheversement()
    {

        $connexion=Configuration::getConnexion();
        $sql="select * from versementdivers";
        $tableau=array();
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {
                $tableau[]=new Versement(

                    $objet->idversement,
                    $objet->motifversement,
                    $objet->dateversement,
                    $objet->montantversement,
                    $objet->nomversant,
                    $objet->typeversement

                );
            }
        }
        return $tableau;

    }



    public static function totalmontant()
    {
        $connexion=Configuration::getConnexion();
        $sql="select SUM(montantversement) as montant_total from versementdivers";
        $montant=0;
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($donnee=$requete->fetch())
            {
                $montant=$donnee['montant_total'];
            }
        }
        return $montant;
    }

    public static function totalmontantdate($date)
    {
        $connexion=Configuration::getConnexion();
        $sql="select SUM(montantversement) as montant_total from versementdivers WHERE dateversement LIKE '%".$date."%'   ";
        $montant=0;
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($donnee=$requete->fetch())
            {
                $montant=$donnee['montant_total'];
            }
        }
        return $montant;
    }


    public static function search($mot)
    {
        $connexion=Configuration::getConnexion();
        $sql="select * from versementdivers WHERE (idversement = '".$mot."' OR motifversement = '".$mot."' OR dateversement LIKE '%".$mot."%' OR montantversement = '".$mot."' OR nomversant= '".$mot."')";
        $tableau=array();
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {
                $tableau[]=new Versement(

                    $objet->idversement,
                    $objet->motifversement,
                    $objet->dateversement,
                    $objet->montantversement,
                    $objet->nomversant,
                    $objet->typeversement

                );
            }
        }
        return $tableau;


    }

}