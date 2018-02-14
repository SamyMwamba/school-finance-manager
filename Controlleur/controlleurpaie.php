<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/13/17
 * Time: 11:55 AM
 */
require_once '../Model/Paiement.php';
include_once '../Model/Sessions.php';

if (isset($_POST['insertnew']))
{

    $paiement=new Paiement(
        null,
       date('Y/m/d'),
        $_POST['motifajout'],
        $_POST['montantajout'],
        $_POST['observationajout'],
        $_POST['matriculeajout'],
        $_POST['anneeajout'],
        $_POST['status']);


        $result = Paiement::ajoutpaiement($paiement);
        if($result==true)
        {
            echo 'Ajout reussi';
        }
        else
        {
            echo 'probleme de la requete';
        }





}

if(isset($_POST['montanttotal']))
{

    $montant=Paiement::totalmontant();
    echo $montant;

}

if( isset($_POST['details'])) {
    $data =null;
    $compt = null;

    $tableau = Paiement::affichepaiement();
    if ($tableau != null) {

        foreach ($tableau as $row) {
            $data=$data."<tr>
            <td>". $row->getIdpaiement()."</td>
            <td>".$row->getDatepaiement()."</td>
            <td>".$row->getMontantpaiement()."</td>
            <td>".$row->getMatriculeeleve()."</td>
            <td>".$row->getMotifpaiement()."</td>
            <td>".$row->getObservationpaiement()."</td>
            <td>".$row->getStatus()."</td>
      
            
            
            
            </tr>";


        }




    }
    echo $data;  // send data as json format
}

if(isset($_POST['mot']))
{
    $data =null;
    $compt = null;

    $tableau = Paiement::search($_POST['mot']);
    if ($tableau != null) {

        foreach ($tableau as $row) {
            $data=$data."<tr>
            <td>". $row->getIdpaiement()."</td>
            <td>".$row->getDatepaiement()."</td>
            <td>".$row->getMontantpaiement()."</td>
            <td>".$row->getMatriculeeleve()."</td>
            <td>".$row->getMotifpaiement()."</td>
            <td>".$row->getObservationpaiement()."</td>
              <td>".$row->getStatus()."</td>
      
            
            
            
            </tr>";


        }
        if ($_POST['isdate']=='vrai')
        {
            $mnt=Paiement::totalmontantdate($_POST['mot']);

            $data= $data.';'.$mnt;
        }





    }
    echo $data;





}

if(isset($_POST['intitule']) AND empty($_POST['annee']))
{
    $data =null;
    $compt = null;

    $tableau = Paiement::search($_POST['intitule']);
    if ($tableau != null) {

        foreach ($tableau as $row) {
            $data=$data."<tr>
            <td>". $row->getIdpaiement()."</td>
            <td>".$row->getDatepaiement()."</td>
            <td>".$row->getMontantpaiement()."</td>
            <td>".$row->getMatriculeeleve()."</td>
            <td>".$row->getMotifpaiement()."</td>
            <td>".$row->getObservationpaiement()."</td>
              <td>".$row->getStatus()."</td>
      
            
            
            
            </tr>";


        }




    }
    echo $data;





}

if(isset($_POST['annee']))
{
    $data =null;

    $montant=Paiement::totalmontantparmois($_POST['intitule'],$_POST['annee']);

    $tableau = Paiement::motifannee($_POST['intitule'],$_POST['annee']);
    if ($tableau != null) {

        foreach ($tableau as $row) {
            $data=$data."<tr>
            <td>". $row->getIdpaiement()."</td>
            <td>".$row->getDatepaiement()."</td>
            <td>".$row->getMontantpaiement()."</td>
            <td>".$row->getMatriculeeleve()."</td>
            <td>".$row->getMotifpaiement()."</td>
            <td>".$row->getObservationpaiement()."</td>
              <td>".$row->getStatus()."</td>
      
            
            
            
            </tr>";


        }




    }
    echo $data.';'.$montant;





}

if(isset($_POST['classepaie']))
{
    $data =null;
    $compt = null;

    $tableau = Paiement::affichepaiementclasse($_POST['val']);
    if ($tableau != null) {

        foreach ($tableau as $row) {
            $data=$data."<tr>
            <td>". $row->getIdpaiement()."</td>
            <td>".$row->getDatepaiement()."</td>
            <td>".$row->getMontantpaiement()."</td>
            <td>".$row->getMatriculeeleve()."</td>
            <td>".$row->getMotifpaiement()."</td>
            <td>".$row->getObservationpaiement()."</td>
              <td>".$row->getStatus()."</td>
      
            
            
            
            </tr>";


        }

$montant=Paiement::totalmontantclasse($_POST['val']);
$data=$data.';'.$montant;


    }
    echo $data;




}




