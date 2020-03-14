<?php
        $reponses=$question['rep'];
        shuffle($reponses);
?>
<link rel="stylesheet" href="choix.css">
    <h2 style="text-align:center">
         <?=$question['question']?>
         </h2>

        <h1 style="text-align:center">nombre de points :<?=$question['score']?>pts</h1>
       
                    
          <?php foreach ($reponses as $k=> $reponse): ?>
                <h1> REP  <?=$k+1 ?> :
               <?= $reponse['rep']?></h1> 
               <input type="hidden" value="off" name="rep[<?=$k?>]" style="float:right">            
               <input type="checkbox" name="rep[<?=$k?>]" style="float:right">            
               <input type="hidden" name="vrais[]" value="<?=$reponse['vrais']?>">

         <?php endforeach;?>


                  
        

