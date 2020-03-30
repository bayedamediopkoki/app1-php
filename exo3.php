
<p><span class="error"></span></p>
    <form method="POST" action="">
       <div ><br>
       
        <input type="text" id="reponse" name="reponse" onkeyup="genere();"><br>
       
         <div id="choix" style="" ><br>
        
      </div><br><br>
      <button type="submit" name="submit" class="button1">EXECUTER</button>
         <button type="reset" class="button2" style="float:left">ANNULER</button></div>
      </div>
      <div style="">
    <script type="text/javascript">
             function genere()
             {
                    var choix=document.getElementById ("choix");
                    var reponse =document.getElementById ("reponse").value;
                    for (let index = 0; index <parseInt(reponse); index++) 
                 {
                    var newInput= document.createElement("input");  
                    newInput.setAttribute('type','text');
                    newInput.setAttribute('placeholder', 'champ'+ index);
                    newInput.setAttribute('name','text['+index+']');
                    choix.appendChild(newInput);
                }
              
             }
           </script>   
</form>
<?php

require_once('function.php');
$t=array();
$n=0;
if (isset($_POST['text'])) {
    $text = $_POST['text'];
  
    for ($i = 0; $i < myStrlen($text); $i++) {
        if (is_valider($text[$i])) {
            if(nbrM($text[$i])==true) {
                $n=$n+1; 
                $mot[]=$text[$i] ;  
            } 
            
      } else{
          echo "Entre des alph dans la formulaire ";
      }
     } 
     echo "<br>";
     echo "Le nombres des caracteres m est  :";
     echo $n;  
      echo "<br>";
     echo "Le nombres des mots contenent de caractere  m est  :";
     for ($i=0; $i < tailleTableu($mot); $i++) { 
        echo "   ";
       echo $mot[$i] ; 
    }
       
    }
?>   

