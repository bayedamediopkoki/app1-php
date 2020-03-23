
<?php 
require_once('function.php');
 session_start();
//session_destroy();
 //var_dump($_SESSION);
 if(!empty($_POST)){
 //$questions=isset($_SESSION['qustion'])?json_decode( $_SESSION['qustion']) :array();
 if (isset($_SESSION['question']) ){
  $questions=$_SESSION['question'];
 }
 else{
  $questions=array();
 }
 if (isset($_POST)) {
   unset($_POST['submit']);
   $question = $_POST;
    $vrais=$question['vrais'];
    if($question['type'] == 'choixmultiple'){
      for ($i=0; $i < count($question['rep']); $i++) { 
        $question['rep'][$i]=[
            "rep"=> $question['rep'][$i],
            "vrais"=> $vrais[$i]
        ];
    }
    unset($question['vrais']);
    }
   
  $questions[]=$question;
 }
 //$_SESSION['qustion']=json_encode($questions);

 $_SESSION['question']=$questions;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<link rel="stylesheet" href="admine.css">
</head>
<body>

  <H1>BIENVENUE DIOP KOKI SUR LA PLATFORME D'EDITION QUESTIONNAIRES</H1>
<div class="container">
  <form action="" method="POST" >
  <div class="row">
      <div class="col-25">
        <label for="quetion">Quetions</label>
      </div>
      <div class="col-75">
        <textarea id="question" name="question" style="height:100px"></textarea>
      </div>

    </div>
    <div class="row">
      <div class="col-25">
        <label for="score">Score</label>
      </div>
      <div class="col-75">
        <input type="text" id="score" name="score" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="type">Type</label>
      </div>
      <div class="col-75" id="ty">
        <select id="typ" name="type">
          <option value="choixmultiple">choix multiple </option>
          <option value="choixsimple">choix simple </option>
          <option value="choixtext">choix text</option>
         
        </select>
      </div>
    </div>
   
    <div class="row" id="row">
      <div class="col-25">
        <label for="reponse">NBRE <BR>REPONSE</label>
      </div>
      <div class="col-75">
        <input type="text" id="reponse" name="reponse" onkeyup="genere();">
      </div>
    </div>
          <div class="row">
          <div class="col-25">
                </div>
                <div id="choix" class="col-75">
                </div>
          </div>

         <div class="row">
                    <input type="submit" name="submit" value="Submit">
                  </div>
                  </div>
           <script type="text/javascript">
             select=document.getElementById("typ");
             select.addEventListener("change",function(e){
              document.getElementById ("row").style.display="block";
               console.log(e);
               var choix=document.getElementById ("choix");
               choix.innerHtml="";
               if(e.target.options.selectedIndex==2)
              { var newInput= document.createElement("input");
               newInput.setAttribute('type','text');
               newInput.setAttribute('placeholder', 'REPONSE');
               newInput.setAttribute('name','vrais');
               choix.appendChild(newInput);
               
               document.getElementById ("row").style.display="none";
              }
             });
             function genere(){
               
             var choix=document.getElementById ("choix");
             choix.innerHtml="";
            var reponse =document.getElementById ("reponse").value;
             var typ =document.getElementById ("typ").value;
             //choixmultiple
              if(typ=="choixmultiple"){
              for (let index = 0; index <parseInt(reponse); index++) {
               var newInput= document.createElement("input");
               var newInput2= document.createElement("input");
               var newInput3= document.createElement("input");
               newInput.setAttribute('type','text');
               newInput2.setAttribute('type','checkbox');
               newInput3.setAttribute('type','hidden');
               newInput.setAttribute('name','rep['+index+']');
               newInput2.setAttribute('name','vrais['+index+']');
               newInput3.setAttribute('name','vrais['+index+']');
               newInput3.setAttribute('value','off');
               newInput.setAttribute('placeholder', 'REPONSE'+ index+1);
               newInput.style.width="85%";
               newInput2.style.width="10%";
               choix.appendChild(newInput);
               choix.appendChild(newInput3);
               choix.appendChild(newInput2);
              }
              }
           
             if(typ=="choixsimple"){
                //choixsimple
                for (let index = 1; index <=parseInt(reponse); index++) {
               var newInput= document.createElement("input");
               var newInput2= document.createElement("input");
               newInput.setAttribute('type','text');
               newInput2.setAttribute('type','radio');
               newInput.setAttribute('name','rep[]');
               newInput2.setAttribute('name','vrais');
               newInput2.setAttribute('value',index-1);
               newInput.setAttribute('placeholder', 'REPONSE'+ index);
               newInput.style.width="100%";
               newInput2.style.width="10%";
               newInput.addEventListener('change',function(e){
                 newInput2.value=e.target.value;
               })
               choix.appendChild(newInput);
               choix.appendChild(newInput2);          
              }
              }
              if(typ=="choixtext"){
               alert(typ=="choixtext");
                        
              }
            }
            
           </script>     
</body>
</html>