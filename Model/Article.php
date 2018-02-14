<?php

/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/11/17
 * Time: 4:55 AM
 */
require_once 'Configuration.php';
class Article
{
    private $idarticle;
    private $designationarticle;
    private $quantitearticle;
    private $prixunitairearticle;
    private $dernieremodification;

    /**
     * @return mixed
     */
    public function getCodearticle()
    {
        return $this->codearticle;
    }

    /**
     * @param mixed $codearticle
     */
    public function setCodearticle($codearticle)
    {
        $this->codearticle = $codearticle;
    }
    private $codearticle;

    /**
     * Article constructor.
     * @param $idarticle
     * @param $designationarticle
     * @param $quantitearticle
     * @param $prixunitairearticle
     * @param $dernieremodification
     * @param $codearticle
     */
    public function __construct($idarticle, $designationarticle, $quantitearticle, $prixunitairearticle, $dernieremodification, $codearticle)
    {
        $this->idarticle = $idarticle;
        $this->designationarticle = $designationarticle;
        $this->quantitearticle = $quantitearticle;
        $this->prixunitairearticle = $prixunitairearticle;
        $this->dernieremodification = $dernieremodification;
        $this->codearticle = $codearticle;
    }


    /**
     * @return mixed
     */
    public function getIdarticle()
    {
        return $this->idarticle;
    }

    /**
     * @param mixed $idarticle
     */
    public function setIdarticle($idarticle)
    {
        $this->idarticle = $idarticle;
    }

    /**
     * @return mixed
     */
    public function getDesignationarticle()
    {
        return $this->designationarticle;
    }

    /**
     * @param mixed $designationarticle
     */
    public function setDesignationarticle($designationarticle)
    {
        $this->designationarticle = $designationarticle;
    }

    /**
     * @return mixed
     */
    public function getQuantitearticle()
    {
        return $this->quantitearticle;
    }

    /**
     * @param mixed $quantitearticle
     */
    public function setQuantitearticle($quantitearticle)
    {
        $this->quantitearticle = $quantitearticle;
    }

    /**
     * @return mixed
     */
    public function getPrixunitairearticle()
    {
        return $this->prixunitairearticle;
    }

    /**
     * @param mixed $prixunitairearticle
     */
    public function setPrixunitairearticle($prixunitairearticle)
    {
        $this->prixunitairearticle = $prixunitairearticle;
    }

    /**
     * @return mixed
     */
    public function getDernieremodification()
    {
        return $this->dernieremodification;
    }

    /**
     * @param mixed $dernieremodification
     */
    public function setDernieremodification($dernieremodification)
    {
        $this->dernieremodification = $dernieremodification;
    }

    public static function affichetout()
    {
        $connexion=Configuration::getConnexion();
        $tableau=array();
        $sql="select * from article";
        if($connexion!=null)
        {
            $resultat=$connexion->prepare($sql);
            $resultat->execute();
            while($object = $resultat->fetch(PDO::FETCH_OBJ))
            {
                $tableau[] = new Article
                ($object->idarticle,
                    $object->designationarticle,
                    $object->quantitearticle,
                    $object->prixunitaire,
                    $object->dernieremodification,
                    $object->codearticle

                );
            }
        }
        return $tableau;

    }

    public static function ajoutarticle(Article $article)
    {
        $connexion=Configuration::getConnexion();
        if($connexion!=null) {

            $sql = "insert into article(codearticle,designationarticle,quantitearticle,prixunitaire,dernieremodification) VALUES ('" . $article->getCodearticle() . "','" . $article->getDesignationarticle() . "','" . $article->getQuantitearticle() . "','" . $article->getPrixunitairearticle() . "','" . date("Y/m/d") . "')";
            $requete = $connexion->prepare($sql);
            $requete->execute();
        }

    }

    public  static function vente($codearticle,$quantite)
    {

        $connexion=Configuration::getConnexion();
        $sql="update article set quantitearticle=quantitearticle-'".$quantite."' where codearticle='".$codearticle."'";
        if ($connexion!=null)
        {
            $requete=$connexion->prepare($sql);
            $requete->execute();


        }

    }

    public static function checkstock($quantite,$codearticle)
    {
        $connexion=Configuration::getConnexion();
        $bool=false;
        $sql="select quantitearticle from article where lagracedatabase.article.codearticle'".$codearticle."'";
        if ($connexion!=null)
        {

            $quantitearticle=0;
            $requete=$connexion->prepare($sql);
            $requete->execute();
            while ($donnee=$requete->fetch())
            {
                $quantitearticle=$donnee['quantitearticle'];
            }
            if ($quantite<=$quantitearticle)
            {
                $bool=true;

            }
        }
        return $bool;
    }

}