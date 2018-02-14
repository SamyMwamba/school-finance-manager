<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/18/17
 * Time: 1:33 PM
 */
require_once '../Model/Versement.php';
if(isset($_POST['insertnewvers']))
{

    $versement=new Versement(
        null,
        $_POST['motifvers'],
        date('Y/m/d'),
        $_POST['montantvers'],
        $_POST['nomvers'],
        $_POST['typevers']
    );

    $result=Versement::ajoutvers($versement);
    if($result==true)
    {
        echo 'Ajout reussi';
    }
    else
    {
        echo 'probleme de la requete';
    }
}

if( isset($_POST['detailsvers'])) {
    $data =null;
    $compt = null;

    $tableau = Versement::afficheversement();
    if ($tableau != null) {

        foreach ($tableau as $row) {
            $data=$data."<tr>
            <td>". $row->getIdvers()."</td>
            <td>".$row->getMontantvers()."</td>
            <td>".$row->getNomvers()."</td>
            <td>".$row->getMotifvers()."</td>
            <td>".$row->getDatevers()."</td>
            <td>".$row->getTypevers()."</td>
           
            
            
            
            </tr>";


        }




    }
    echo $data;  // send data as json format
}

if(isset($_POST['montanttotalvers']))
{

    $montant=Versement::totalmontant();
    echo $montant;

}

if(isset($_POST['motvers']))
{
    $data =null;
    $compt = null;

    $tableau = Versement::search($_POST['motvers']);
    if ($tableau != null) {

        foreach ($tableau as $row) {
            $data=$data."<tr>
            <td>". $row->getIdvers()."</td>
            <td>".$row->getMontantvers()."</td>
            <td>".$row->getNomvers()."</td>
            <td>".$row->getMotifvers()."</td>
            <td>".$row->getDatevers()."</td>
            <td>".$row->getTypevers()."</td>    
            </tr>";


        }

        if ($_POST['isdate']=='vrai')
        {
            $mnt=Versement::totalmontantdate($_POST['motvers']);

           $data= $data.';'.$mnt;
        }






    }
    echo $data;





}