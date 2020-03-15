
    
</head>
<body>
<div>
  <form action="admine.php" method="post">
      <h1> BI</h1>
    <label for="nom">NOM :</label>
    <input type="text" id="fname" name="firstname" placeholder="Entre votre nom svp..."><br>

    <label for=" prenom">PRENOM</label>
    <input type="text" id="prenom" name="prenom" placeholder="Entre votre prenom svp...">
    <input type="submit" value="Submit">
  </form>
</div>
<?php  
        if(isset($_POST['nom'])  && isset($_POST['prenom'])){
            if (!empty($_POST['nom'])) {
                if (!empty($_POST['prenom'])) {
                    $_SESSION['nom']=$nom['nom'];
                    $_SESSION['prenom']=$prenom['prenom'];
                    header('location:admine.php');
                    
                } 
                else{
                    echo "<script>alert('Veuillez Saisir   votre nom !!!!!');</script>";
                }
                }
                else{
                    echo "<script>alert('Veuillez Saisir   votre prenom !!!!!');</script>";
                }
            }
?>
</body>
</html>