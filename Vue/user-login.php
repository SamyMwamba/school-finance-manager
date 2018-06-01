<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->


<!-- Mirrored from demo.geekslabs.com/materialize/v3.1/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jun 2016 23:35:59 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>sfm</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col offset-l4 s12 l3 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row center">
          <div class="input-field col s12 center">
              <i  alt="" class="mdi-action-account-circle mdi-5x circle responsive-img valign profile-image-login"></i>
            <p class="center login-form-text">sfm Login</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="matricule" type="text">
            <label for="matricule" class="center-align">Matricule</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="motdepasse" type="password">
            <label for="motdepasse">Mot de passe</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <button id="btn_valide" class="btn waves-effect waves-light col s12">Connexion</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Aide</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">login perdu ?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
  <script>

      $(document).ready(function () {
          var objet=$("#btn_valide");
          objet.click(function () {
              var matricule=$("#matricule").val();
              var password=$("#motdepasse").val();

              $.ajax({
                  url:'http://devpay.biz/lagrace/Controlleur/controlleurgerant.php',
                  method: "POST",
                  data:{login:"login",matricule:matricule,password:password},
                  success:function (result) {
                      if (result=='caissier')
                      {
                          window.location.replace('caissier/home.php');
                      }

                      else if(result=='comptable')
                      {
                          window.location.replace('comptable/showpaie.php');
                      }

                      else if(result=='controlleurfin')
                      {
                          window.location.replace('controlleurfin/home.php');
                      }
                      else if(result=='promoteur')
                      {
                          window.location.replace('promoteur/home.php');
                      }
                      else
                      {
                          alert('le resultat est null');
                      }


                  }
              })
          })
      })

  </script>

</body>


<!-- Mirrored from demo.geekslabs.com/materialize/v3.1/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jun 2016 23:36:03 GMT -->
</html>
