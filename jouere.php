<?php
session_start();

// var_dump($_SESSION['donne']);
$index=isset($_GET['page'])?$_GET['page']:1;
$score=0;
if(isset($_SESSION['score'])){
   $score= $_SESSION['score'];
}
if (!isset($_SESSION['question'])) {
   echo "<h1>  l' addministratur doit creer des questions</h1>";
   die;
}
$ok=true;

if(!empty($_POST)){
  // var_dump($_POST);
   if($_POST['type']=="choixmultiple"){
      
       for ($i=0; $i <count($_POST['rep']); $i++) { 
           if($_POST['rep'][$i]!=$_POST['vrais'][$i])
            $ok=false;
       }
      
    }
    
       elseif($_POST['type']=='choixsimple'){
        if($_POST['rep']!=$_POST['vrais'])
        $ok=false;
       }
       
            if($ok==true){
                $score+=$_POST['score'];
                $_SESSION['score']=$score;
            }
   
}
$question= $_SESSION['question'][$index-1];
$type=$question['type'];
//var_dump($question);
   echo "vous avez $score ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        div {
            width: 40%;
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      margin-left:400px;
    }
     body{
    width: 100%;
    margin: 0 auto;
    }
    </style>
</head>
<body>
<!-- <h1>Bienvenue <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></h1> -->
<H1 style=" background-color: green; color:#fff;  width: 60%; margin-left:300px;" >

    BIENVENUE <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?>SUR LA PLATFORME DE REPONSE AUX QCM
    </H1> 
    <div>
    <form action="?page=<?=$index+1?>" method="POST">
    <input type="hidden" name="type" value="<?=$type?>">
    <input type="hidden" name="score" value="<?=$question['score']?>">
          <?php
             require_once($type.'.php')
          ?>
<br>
          <a href="jouere.php?page=<?=$index-1?>" >precedent</a>
          <input type="submit" value="suivant" style=" margin-left:500px ">
    
    </form>
</div>
</body>
</html>