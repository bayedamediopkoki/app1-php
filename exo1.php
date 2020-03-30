
    <form action="" method="POST">
      <h2> ENTRE UN NOMBRE SUPPERIEUR A 10000</h1>
        <input type="number" name="a" style="width :50%; height: 60px;"><BR>
        <button type=" button " >CALCULER</button>
    </form>
    <?php

    require_once('function.php');
    sleep(1);
  //   $c="c";
  //  $alp= alphbetique($c);
  //  var_dump($alp);
    $cpt=0;
    $pageCourant;
    $_SESSION['nombreParPage'] = 10;
    $T1 = array();
    if (isset($_POST['a'])) {
        $a=$_POST['a'];
        $_SESSION['a']= $a;
        if (! empty($_POST['a']) )  {
          if($a>5){
            
           for ($i=2; $i <= $a; $i++) { 

                if (premiere($i)==true) {
                  array_push($T1,$i); 
                  $_SESSION['T1']=$T1;
                } 
            }
            $_SESSION['nombreTotal'] = count($_SESSION['T1']);
            $_SESSION['pageTotal'] = ceil($_SESSION['nombreTotal'] / $_SESSION['nombreParPage']);
            for ($i = 1; $i <= $_SESSION['pageTotal']; $i++) {
              echo '<a href="exo1.php?page='.$i . '">' . $i . '</a> ';
            } 
            echo '<br>';
            if (isset($_GET['page']) && $_GET['page'] > 0) 
            {
                $_GET['page'] = intval($_GET['page']);
                $_SESSION['pageCourant'] = $_GET['page'];  
            } else {
                $_SESSION['pageCourant'] = 1;  
            }
            $_SESSION['debut']=0;
            $nombreParPage=10;
               
            $_SESSION['debut'] = ($_SESSION['pageCourant'] - 1) * $nombreParPage; 
            echo '<br>';
            echo '<table class=affichePremier>';
            echo '<tr>';
            for ($i = $_SESSION['debut']; $i <$nombreParPage * $_SESSION['pageCourant']; $i += 10) {
               
                for ($j = $i; ($j < $i + 10 && $j < $T1); $j++) {
                    echo '<td>' . $T1[$j] . '</td>';
                    // echo '</br>';
                   
                }
                echo '</br>';
            }
            echo '</table>';
            
                    $moyen=moyenne($T1);
                    echo "<br>";
                    echo "   ";
                    echo "la moyenne des nombre premoiere est de :";
                    echo $moyen;
                
                $T = array("inferieur"=>array(), "superieur"=>array());
                for ($i=0; $i <count($T1) ; $i++) { 
                    if ($T1[$i]<$moyen) {
                      $T['inferieur'][]=$T1[$i];
                    } else{
                        $T['superieur'][]=$T1[$i];
                    }  
                } 
                echo "<br>";
                echo "les nombre premieur inferieur ";
                for ($i=0; $i <count($T['inferieur']); $i++) { 
                  echo $T['inferieur'][$i];
                }
                echo "<br>";
                echo "les nombre premieur superieur ";
                for ($i=0; $i <count($T['superieur']); $i++) { 
                  echo $T['superieur'][$i];
                }

                  }
                  else{
                    echo " veuillez saisir un monbre SUPPERIEUR A 10000 svp";
                  }
                }
                }
    ?>
