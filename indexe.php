<?php 

$_SESSION['login']="diopkoki";
$_SESSION['mod']= "diop";

if (isset($_POST['login']) && isset($_POST['psw'])) {
    

    if(!empty($_POST['login'])){
        
        if(!empty($_POST['psw'])){
            $login=$_POST['login'];
            $mod=$_POST['psw'];

                if ($_SESSION['login']==$login ){
                    if ($_SESSION['mod']== $mod ){
                        header("location:admine.php") ;
                } 
                else{
                    echo "<script>alert('Veuillez Verifier  votre mo de passe !!!');</script>";
                }
                
            }
          
         else{
                echo "<script>alert(' le profil n'est pas bon');</script>";
         
         }
        }
                  else
                  {
                   echo "<script>alert('Veuillez renseigner  votre champ mo de passe' );</script>";
                  } 
            }
            else
            {
                echo "<script>alert('Veuillez renseigner  le champ login');</script>";
            }
   
        }
             

 ?>
 
