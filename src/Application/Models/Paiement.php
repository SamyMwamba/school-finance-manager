<?php

/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/11/17
 * Time: 4:54 AM
 */
require_once 'Configuration.php';
class Paiement
{
    private $idpaiement;
    private $datepaiement;
    private $motifpaiement;
    private $montantpaiement;
    private $observationpaiement;
    private $matriculeeleve;
    private $anneepaiement;
    private $status;

    /**
     * Paiement constructor.
     * @param $idpaiement
     * @param $datepaiement
     * @param $motifpaiement
     * @param $montantpaiement
     * @param $observationpaiement
     * @param $matriculeeleve
     * @param $anneepaiement
     * @param $status
     */
    public function __construct($idpaiement, $datepaiement, $motifpaiement, $montantpaiement, $observationpaiement, $matriculeeleve, $anneepaiement, $status)
    {
        $this->idpaiement = $idpaiement;
        $this->datepaiement = $datepaiement;
        $this->motifpaiement = $motifpaiement;
        $this->montantpaiement = $montantpaiement;
        $this->observationpaiement = $observationpaiement;
        $this->matriculeeleve = $matriculeeleve;
        $this->anneepaiement = $anneepaiement;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }



    /**
     * @return mixed
     */
    public function getIdpaiement()
    {
        return $this->idpaiement;
    }

    /**
     * @param mixed $idpaiement
     */
    public function setIdpaiement($idpaiement)
    {
        $this->idpaiement = $idpaiement;
    }

    /**
     * @return mixed
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * @param mixed $datepaiement
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;
    }

    /**
     * @return mixed
     */
    public function getMotifpaiement()
    {
        return $this->motifpaiement;
    }

    /**
     * @param mixed $motifpaiement
     */
    public function setMotifpaiement($motifpaiement)
    {
        $this->motifpaiement = $motifpaiement;
    }

    /**
     * @return mixed
     */
    public function getMontantpaiement()
    {
        return $this->montantpaiement;
    }

    /**
     * @param mixed $montantpaiement
     */
    public function setMontantpaiement($montantpaiement)
    {
        $this->montantpaiement = $montantpaiement;
    }

    /**
     * @return mixed
     */
    public function getObservationpaiement()
    {
        return $this->observationpaiement;
    }

    /**
     * @param mixed $observationpaiement
     */
    public function setObservationpaiement($observationpaiement)
    {
        $this->observationpaiement = $observationpaiement;
    }

    /**
     * @return mixed
     */
    public function getMatriculeeleve()
    {
        return $this->matriculeeleve;
    }

    /**
     * @param mixed $matriculeeleve
     */
    public function setMatriculeeleve($matriculeeleve)
    {
        $this->matriculeeleve = $matriculeeleve;
    }

    /**
     * @return mixed
     */
    public function getanneepaiement()
    {
        return $this->anneepaiement;
    }

    /**
     * @param mixed $anneepaiement
     */
    public function setanneepaiement($anneepaiement)
    {
        $this->anneepaiement = $anneepaiement;
    }

    public static function affichepaiement()
    {

        $connexion=Configuration::getConnexion();
        $sql="select * from paiementfrais";
        $tableau=array();
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {
                $tableau[]=new Paiement(

                $objet->idpaiement,
                $objet->datepaiement,
                $objet->motifpaiement,
                $objet->montantpaiement,
                $objet->observationpaiement,
                $objet->matriculeeleve ,
                $objet->anneepaiement,
                $objet->status
                );
            }
        }
        return $tableau;

    }


    public static function affichepaiementclasse($classe)
    {

        $connexion=Configuration::getConnexion();
        $sql="SELECT * FROM `paiementfrais` INNER join eleve on(eleve.matriculeeleve=paiement.matriculeeleve) WHERE(classeeleve='".$classe."')";
        $tableau=array();
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {
                $tableau[]=new Paiement(

                    $objet->idpaiement,
                    $objet->datepaiement,
                    $objet->motifpaiement,
                    $objet->montantpaiement,
                    $objet->observationpaiement,
                    $objet->matriculeeleve ,
                    $objet->anneepaiement,
                    $objet->status
                );
            }
        }
        return $tableau;

    }

    public static function ajoutpaiement(Paiement $paiement)
    {
        $connexion=Configuration::getConnexion();
        $bool=false;
        $sql="insert into paiementfrais(datepaiement,motifpaiement,montantpaiement,observationpaiement,matriculeeleve,anneepaiement,status) VALUES ('".$paiement->getDatepaiement()."','".$paiement->getMotifpaiement()."','".$paiement->getMontantpaiement()."','".$paiement->getObservationpaiement()."','".$paiement->getMatriculeeleve()."','".$paiement->getanneepaiement()."','".$paiement->getStatus()."')";

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
    public static function totalmontant()
    {
        $connexion=Configuration::getConnexion();
        $sql="select SUM(montantpaiement) as montant_total from paiementfrais";
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
    public static function totalmontantparmois($mois,$year)
    {
        $connexion=Configuration::getConnexion();
        $sql="select SUM(montantpaiement) as montant_total from paiementfrais WHERE (motifpaiement='".$mois."' AND anneepaiement='".$year."')";
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
        $sql="select SUM(montantpaiement) as montant_total from paiementfrais WHERE ( datepaiement LIKE '%".$date."%')";
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

    public static function totalmontantclasse($classe)
    {
        $connexion=Configuration::getConnexion();
        $sql="SELECT SUM(montantpaiement) AS mnt FROM `paiementfrais` INNER join eleve on(eleve.matriculeeleve=paiement.matriculeeleve) WHERE(classeeleve='5e')";
        $montant=0;
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($donnee=$requete->fetch())
            {
                $montant=$donnee['mnt'];
            }
        }
        return $montant;

    }

    public static function search($mot)
    {
        $connexion=Configuration::getConnexion();
        $sql="select * from paiementfrais WHERE (idpaiement = '".$mot."' OR motifpaiement = '".$mot."' OR matriculeeleve = '".$mot."' OR observationpaiement = '".$mot."' OR datepaiement LIKE '%".$mot."%')";
        $tableau=array();
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {
                $tableau[]=new Paiement(

                    $objet->idpaiement,
                    $objet->datepaiement,
                    $objet->motifpaiement,
                    $objet->montantpaiement,
                    $objet->observationpaiement,
                    $objet->matriculeeleve ,
                    $objet->anneepaiement,
                    $objet->status
                );
            }
        }
        return $tableau;


    }

    public static function motifannee($motif,$year)
    {
        $connexion=Configuration::getConnexion();
        $sql="select * from paiement WHERE ( motifpaiement = '".$motif."' AND anneepaiement = '".$year."')";
        $tableau=array();
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($objet=$requete->fetch(PDO::FETCH_OBJ))
            {
                $tableau[]=new Paiement(

                    $objet->idpaiement,
                    $objet->datepaiement,
                    $objet->motifpaiement,
                    $objet->montantpaiement,
                    $objet->observationpaiement,
                    $objet->matriculeeleve ,
                    $objet->anneepaiement,
                    $objet->status
                );
            }
        }
        return $tableau;


    }




}