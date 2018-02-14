<?php

/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/14/17
 * Time: 11:27 AM
 */
require_once 'Configuration.php';
class Prix
{
    private $idprix;
    private $intitule;
    private $prix;


    /**
     * Prix constructor.
     * @param $idprix
     * @param $intitule
     * @param $prix
     * @param $status
     */
    public function __construct($idprix, $intitule, $prix)
    {
        $this->idprix = $idprix;
        $this->intitule = $intitule;
        $this->prix = $prix;

    }




    /**
     * @return mixed
     */
    public function getIdprix()
    {
        return $this->idprix;
    }

    /**
     * @param mixed $idprix
     */
    public function setIdprix($idprix)
    {
        $this->idprix = $idprix;
    }

    /**
     * @return mixed
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param mixed $intitule
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


    public static function afficheprix()
    {
        $connexion=Configuration::getConnexion();
        $tableau=array();
        $requete=null;
        $sql="select * from prixfrais";
        if ($connexion!=null)
        {

            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {

                $tableau[]=new Prix(
                    $objet->idprix,
                    $objet->intitule,
                    $objet->prix
                );

            }



        }

        return $tableau;

    }
    public static function getprixbyintitule($intitule)
    {

        $connexion=Configuration::getConnexion();
        $prix=null;
        $requete=null;
        $sql="select prix from prixfrais WHERE intitule='".$intitule."'";

        if ($connexion !=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();

            while ($donne=$requete->fetch())
            {
                $prix=$donne['prix'];

            }

        }
        $requete->closeCursor();
        return $prix;
    }

    public static function checkprix($intitule)
    {

        $connexion=Configuration::getConnexion();
        $prix=null;
        $requete=null;
        $sql="select prix from prixfrais WHERE (intitule='".$intitule."')";

        if ($connexion !=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();

            while ($donne=$requete->fetch())
            {
                $prix=$donne['prix'];

            }

        }
        $requete->closeCursor();
        return $prix;
    }



}