<?php


require '../../Model/Sessions.php';

if(!isset($_SESSION['nomgerant']) AND $_SESSION['typegerant']!='caissier')
{
    header('Location:../user-login.php');

}



?>

<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin
	Version: 3.1
	Author:
	Author URL: http://www..net/user/
================================================================================ -->


<!-- Mirrored from ..com/materialize/v3.1/app-widget.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jun 2016 23:32:47 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">

    <title>caisse|Lagrace</title>


    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="../images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->

    <link href="../css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="../css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">



</head>

<body>
<!-- Start Page Loading -->

<!-- End Page Loading -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper">
                <ul class="left">
                    <li><h1 class="logo-wrapper"><a href="index-2.html" class="brand-logo darken-1">cs lagrace</a> <span class="logo-text">CS LAGRACE</span></h1></li>
                </ul>



            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <span  class="circle mdi-action-account-circle responsive-img valign profile-image mdi-5x"></span>
                        </div>
                        <div class="col col s8 m8 l8">
                            <ul id="profile-dropdown" class="dropdown-content">
                                <li id="btn_dec"><a href="#" id="btn_dec">Deconnexion</a>
                                </li>


                            </ul>
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['nomgerant']?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal"><?php echo $_SESSION['typegerant'] ?></p>
                        </div>
                    </div>
                </li>
                <li class="bold"><a href="home.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                </li>

                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> PAIEMENT FRAIS</a>
                            <div class="collapsible-body" style="display: none;">
                                <ul>
                                    <li class="bold"><a href="addpaie.php" class="waves-effect waves-cyan  text-left"><i class="mdi-content-add-circle"></i>NOUVEAU PAIMENT</a>
                                    </li>
                                    <li class="bold"><a href="showpaie.php" class="waves-effect waves-cyan  text-left"><i class="mdi-image-remove-red-eye"></i>AFFICHER PAIEMENTS</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>


                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> VERSEMENT DIVERS</a>
                            <div class="collapsible-body" style="display: none;">
                                <ul>
                                    <li class="bold"><a href="addvers.php" class="waves-effect waves-cyan  text-left"><i class="mdi-content-add-circle"></i>NOUVEAU VERSEMENT</a>
                                    </li>
                                    <li class="bold"><a href="showvers.php" class="waves-effect waves-cyan  text-left"><i class="mdi-image-remove-red-eye"></i>AFFICHER VERSEMENTS</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-my-library-books"></i>VENTE FOURNITURES</a>
                            <div class="collapsible-body" style="display: none;">
                                <ul>
                                    <li class="bold"><a href="addvente.php" class="waves-effect waves-cyan  text-left"><i class="mdi-content-add-circle"></i>NOUVELLE VENTE</a>
                                    </li>
                                    <li class="bold"><a href="showvente.php" class="waves-effect waves-cyan  text-left"><i class="mdi-image-remove-red-eye"></i>AFFICHER VENTE</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>



        </aside>
