<?php
require_once('function.php');
 ?>

<?php 
    echo "<font color=\"#800080\">Aujourd'hui nous sommes le : </font>" .date('d/m/Y');
	echo "<br><font color=\"#800080\"> Il est :</font> " .date('H \h i \m\i\n s \s\e\c ');
?>

<style>
table {
  border: 1px solid;
  border-collapse: collapse;
  margin-left: 400px;
  margin-top:50px;
}

th, td {
  text-align: left;
  padding: 10px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
button{
        width:100px;
        height: 30px;
        margin-left: 600px;
  margin-top:50px;
  background-color: ;       
}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>

<div class="container">
    <H1>SONATEL ACADEMIE</H1>
    <form method="POST" action="">
        <label for=""><h1> ENTRE 5 VALEUR SEPARE PAR UN SPACE SVP</h1></label><br>
   
    <textarea name="a" id="" cols="100" rows="10"  style=" margin-left: 400px;"></textarea>
    <br>
    <button type="submit" name="submit" class="button1" class="btn" >ENTREE</button><br>
</form>
<?php
 
require_once('function.php');
$nombre=array();
if(isset($_POST['a'])){
    if(!empty($_POST['a'])){
                $a=$_POST['a'];
                    $nombre=rePharase($a);  
        }
        else{
            echo "saisire un mot";
        }     
        }
        echo "<table border:2px solid>";
        for ($i=0; $i <count($nombre) ; $i++) { 
           
            echo "<td>$nombre[$i]</td>";
           
        } 
        echo "</table>";  
    ?>
