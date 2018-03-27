<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/13/17
 * Time: 11:10 AM
 */
require_once '../Model/Eleve.php';
require_once '../Model/Sessions.php';
$tableau=array();
if(isset($_POST['verifiemat']))
{
    $nom=null;
    $postnom=null;
    $tableau=Eleve::afficheeleveparmatricule($_POST['matricule']);
    if($tableau!=null)
    {
        foreach ($tableau as $item)
        {
            $nom=$item->getNom();
            $postnom=$item->getPostnom();
        }
    }

    echo $nom.";".$postnom;

}

if (isset($_POST['elevetotal']))
{

    $nb=Eleve::totaleleve();
    echo $nb;

}

if(isset($_POST['classe']))
{
    $data="";
    $tableau=array();
    $tableau=Eleve::afficheclasse();
    foreach ($tableau as $item)
    {

        $data=$data. "
        
                <option>".$item->getClasse()."</option>
        ";


    }



    echo $data;



}

