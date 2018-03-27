<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/12/17
 * Time: 2:48 PM
 */
require_once '../Model/Gerant.php';
require_once '../Model/Sessions.php';
$tableau=array();
$text=null;

if(isset($_POST['login']))
{

    $tableau=Gerant::login($_POST['matricule'],$_POST['password']);
    if ($tableau!=null)
    {
        foreach ($tableau as $item) {


            $_SESSION['nomgerant'] = $item->getNomgerant();
            $_SESSION['matriculegerant'] = $item->getMatriculegerant();
            $_SESSION['typegerant'] = $item->getTypegerant();
            $text=$item->getTypegerant();
        }

    }

echo $text;
}

if(isset($_POST['deconnexion']))

{

    unset($_SESSION['nomgerant']);
    unset($_SESSION['typegerant']);
    unset($_SESSION['matriculegerant']);

    echo 'true';


}

