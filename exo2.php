
    <style>
table {
  border: 1px solid;
  border-collapse: collapse;
  margin-left: 400px;
  margin-top:50px;
}
th, td {
  text-align: left;
  padding: 30px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
  text-align: center;
}
.btn{
        width:120px;
        height: 59px;
       font-size: 15px;
        margin-left: 100px;
        margin-top:50px;
        background-color: green; 
        float:left;     
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>

 <form action="" method="POST">
 <button name="fr" class="btn">FRANCAIS</button>
   <button name="en" class="btn">ANGLAIS</button>
   <option value=""></option>
   <select name="selecte" id="select" onchange="myFunction()">
     <option value="fr" >FRANCAIS</option>
     <option value="en" >ANGLAIS</option>

   </select>

 </form>

<?php
if (!empty($_POST)) {
  
  $cla=array(
    '1'=>['Janvier','January'],
    '2'=>['Fevrier','February'],
    '3'=>['Mars','March'],
    '4'=>['Avril','April'],
    '5'=>['Mai','May'],
    '6'=>['Juin','June'],
    '7'=>['Juillet','July'],
    '8'=>['Aout','August'],
    '9'=>['Septembre','September'],
    '10'=>['Octobre','October'],
    '11'=>['Nonvembre','Nonvember'],
    '12'=>['Decembre','December'],
  )  ;        
  if(isset($_POST['en']) || isset($_POST['fr'])){
   $langue=isset($_POST['en']) ?1 : 0;
     $mat=array_chunk($cla,3);
     $i=1;
     echo "<table>";
    foreach ($mat as $value) {
    echo" <tr>";
          foreach ($value as $key => $t) {
            echo "<td>$i</td>";
            echo "<td>$t[$langue]</td>";
            $i++;
          }      
          echo "</tr>";
     }
     echo "</table>";       
       }            
            }   
              
         ?>
        
