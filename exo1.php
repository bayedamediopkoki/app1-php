
    <form action="" method="POST">
        <input type="text" name="a" ><BR>
        <button type=" button " >CALCULER</button>
    </form>
    <?php
    require_once('function.php');
    $cpt=0;
    $T1 = array();
    if (isset($_POST['a'])) {
        $a=$_POST['a'];
        if (! empty($_POST['a']) )  {
            if (preg_match('^[0-9]^',$_POST['a'])) {
           for ($i=2; $i <= $a; $i++) { 

                if (premiere($i)==true) {
                  array_push($T1,$i); 
                } 
            }
          }
       
       }    
       $mat=array_chunk($T1,20);
       
        echo '<table >';   
          for ($i=0; $i <count($T1) ; $i++) {
            $cpt=$cpt+$T1[$i];
            
            echo "<td > $T1[$i]</td>";
           
        }
        echo "</table>"; 
        $moyen=$cpt/count($T1,10);
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
            echo " veuillez saisir un monbre svp";
        }
    ?>
