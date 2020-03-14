<?php
require_once('function.php');
$error=false;
$tail=false;
if (!empty($_POST)) {
    $tail=$_POST['tail'];   
    $c1=$_POST['c1'];   
    $c2=$_POST['c2'];   
    $c3=$_POST['c3'];   
    $c4=$_POST['c4'];   
    if (empty($tail)) {
      $error ="la taille de est vide ,VEUILLEZ SAISIR UNE TAILLE ";
    }
    else if (!preg_match('/^[0-9]+$/',$tail)) {
        $error ="saisir un nombre SVP!!";
    }  
    else if($c1==$c2){
        $error="la coloeur ne peut pas etre la meme en meme temp";
    } 
}
?>

<?php
      $color =array(
         'black',
         'red',
         'yellow',
         'green',
         'blue',
         'olive'   
     );
     ?>

<?php 
    echo "<font color=\"#800080\">Aujourd'hui nous sommes le : </font>" .date('d/m/Y');
	echo "<br><font color=\"#800080\"> Il est :</font> " .date('H \h i \m\i\n s \s\e\c ');
 
?>	

<div class="container">
    <H1>SONATEL ACADEMIE</H1>
  <form action="" method="POST" >
    <div class="row">
      <div class="col-75">
        <label for="Taile">Taille de la matricee</label>
        <input type="text" id="tail" name="tail" >
      </div>
    </div>
    <div class="row">
      <div class="col-75">
        <label for="c1">Select C1</label>
        <select id="c1" name="c1">
         <?php
            foreach ($color as $val) {
               echo " <option value=".$val.">".$val."</option>";
            }
         ?>
        </select>
      </div>
    </div>
    <div class="col-75">
        <!-- <i class="fa fa-user icon"><img src="images/icone-user.png" alt=""></i> -->
        <label for="c2">Select C2</label> 
        <select id="c2" name="c2">
        <?php
            foreach ($color as $val) {
               echo " <option value=".$val.">".$val."</option>";
            }
         ?>
        </select>
      </div> 
      <div class="col-75">
        <!-- <i class="fa fa-user icon"><img src="images/icone-user.png" alt=""></i> -->
        <label for="c4">Select C3</label> 
        <select id="c4" name="c4">
        <?php
            foreach ($color as $val) {
               echo " <option value=".$val.">".$val."</option>";
            }
         ?>
        </select>
      </div>
      <div class="col-75">
        <!-- <i class="fa fa-user icon"><img src="images/icone-user.png" alt=""></i> -->
        <label for="c3">Position</label>
        <select id="c3" name="c3">
          <option value="haut">HAUT</option>
          <option value="bas">BAS</option>
          
        </select>
      </div>
      <div class="row">
      <input type="submit" value="Dessiner">

    </div>
    <div class="row">
        <input type="reset" value="Annuler">
        
           <?php if ($error): ?>
            <p><?=$error?></p>
     <?php endif;?>
    <?php if (!$error && $tail): ?>
      <table style=" background-color:#fff;margin-top: 0 auto">
                <?php
                    for ($i=0; $i<$tail; $i++) {
                        echo '<tr>';
                     for ($j=0; $j<$tail; $j++) {
                             if ($j>$i && $j <($tail-$i-1) ) {
                               echo '<td class="border" style=" width: 50px; background-color:'.$c1.'"></td> ';
                             }
                             elseif($j==$i) {
                                    echo '<td class="border"style=" width: 50px; height: 50px;background-color:'.$c1.'"></td> ';
                                 }
                             elseif($j== ($tail-$i-1)) {
                                    echo '<td class="border" style=" width: 50px; height: 50px; background-color:'.$c1.'"></td> ';
                                 }
                             elseif($j>$i  || $j<( $tail-$i-1) ) {
                                    echo '<td class="border" style=" width: 50px; height: 50px; background-color:'.$c2.'"></td> ';
                                 }
                                 else
                                 echo '<td  class="border"style=" width: 50px; height: 50px; background-color:black"></td> ';
                             }  
                             echo '</tr>';     
                     }
                   
                    
                 ?>
                 </table>
    <?php endif;?>
