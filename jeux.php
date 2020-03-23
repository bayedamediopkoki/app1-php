<?php 
session_start();

if(!empty($_POST)){
    //$questions=isset($_SESSION['qustion'])?json_decode( $_SESSION['qustion']) :array();
    if (isset($_SESSION['donne']) ){
     $donnes=$_SESSION['donne'];
    }
    else{
     $donnes=array();
    }
    if (isset($_POST)) {
      unset($_POST['submit']);
      $donne = $_POST;
       //$vrais=$question['vrais'];
       
      
     $donnes[]=$donne;
    }
    //$_SESSION['qustion']=json_encode($questions);
   
    $_SESSION['donne']=$donnes;
   
   }
      //var_dump($_SESSION['donnes']);
 ?>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="jeux.css">
</head>
<body>
<h1 style="text-align:center">BIENVENUE SUR PAGE D ' AUTHENTIFICATION <br> DE NOTRE PLATFORME QCM </h1>

<div>
  <form action="">
  NOM :</p>
    <input type="text" id="nom" name="nom" placeholder="Entre votre nom...."><br>

   <p>PRENOM :</p><br>
    <input type="text" id="prenom" name="prenom" placeholder="Entre votre prenom">

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>