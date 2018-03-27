<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/14/17
 * Time: 11:51 AM
 */

require_once '../Model/Prix.php';


if(isset($_POST['intitule1']))
{
    $data="";
    $tableau=array();
    $tableau=Prix::afficheprix();
    foreach ($tableau as $item)
    {

        $data=$data. "
        
                <option>".$item->getIntitule().":".$item->getPrix().  "</option>
        ";


    }

$data."";

    echo $data;



}

if(isset($_POST['intitule2']))
{
    $data="";
    $tableau=array();
    $tableau=Prix::afficheprix();
    foreach ($tableau as $item)
    {

        $data=$data. "
        
                <option>".$item->getIntitule()."</option>
        ";


    }

    $data."";

    echo $data;



}

if( isset($_POST['detailsprix'])) {
    $tableau=array();
    $data =null;
    $tableau = Prix::afficheprix();
    if ($tableau != null) {

        foreach ($tableau as $row) {
            $data=$data."<tr>
            <td>". $row->getIntitule()."</td>
            <td>".$row->getPrix()."</td>
     
            
            </tr>";


        }




    }
    echo $data;
}
if(isset($_POST['checkprix']))
{
    $montant=Prix::getprixbyintitule($_POST['motif']);

echo $montant;
}