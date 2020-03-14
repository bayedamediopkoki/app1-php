
    <style> 
        input[type=text] {
          width: 60%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
        }
        .error {color: #FF0000;}
    .button1 {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
               float: left;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                float: initial;
                font-size: 16px;
                margin-top: 30px;
               margin-left: 190px;
}
.button2{
                background-color: red; /* Green */
                border: none;
                color: white;
               float: left;
                padding: 15px 32px;
                text-align: center;
               
                margin-top: -50px;
               
                font-size: 16px;
}
        </style>

<?php
require_once('function.php');
echo "<br>";
$t=array();
$t1=array();
$i=0;
$n;
if(isset($_POST['a'])){
    if(!empty($_POST['a'])){
                $a=$_POST['a'];
                $t=explode(" ",$a);
                echo "le nombre des mot dans le tableau est :";
                for ($i=0; $i <count($t) ; $i++) { 
                    echo "<br>";
                  echo $t[$i];

                }
                echo "le nombre des mot dans contenet le mot est :";
               $nombre= nbrM($a);   
        }
        else{
            echo "saisire un mot";
        } 
   
         echo $nombre;  
            
            
        }
    ?>
   <h2>PHP Form Validation Example</h2>
<p><span class="error"></span></p>
    <form method="POST" action="">
        <label for=""><h1> ENTRE 5 VALEUR SEPARE PAR UN SPACE SVP</h1></label><br>
   
    <textarea name="a" id="" cols="30" rows="10"></textarea>
    
    
    <br>
    
    <br>
        
    <button type="submit" name="submit" class="button1">CALCULER</button><br>
    <button type="reset" class="button2">ANNULER</button><br>
    
</form>
