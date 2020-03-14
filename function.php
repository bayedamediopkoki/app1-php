<?php 
function premiere($n){
    $ok=true;
    for ($i=2; $i <=$n/2 ; $i++) { 
        
        if ($n%$i==0) {
           
           $ok=false;
        }
    }
   return $ok;
}
//functiom de recherche
function recherche ($t){
  
   
    for ($i=0; $i <strlen($t) ; $i++) { 
       if ( strtolower ($t[$i]=='m') ){  //convertir en miniscule
          return true;
       }
    }
    return false;
}
function nbrM($chaine){
    $cpt=0;
      $t=explode(" ",$chaine);
      for ($i=0; $i <count($t) ; $i++) { 
        if (recherche($t[$i])) {
          $cpt+=1;
        }
      }
      return $cpt;
}

function getColor($c1,$c2,$i,$j,$n,$c3){
    if ($c3=='haut') {
       $tmp=$c1;
       $c1=$c2;
       $c2=$tmp;
    }
    if ($i<$j ) {
      if ($i+$j==$n-1) {
         return $c2;
      }
      return $c1;
    }
    return $c2;
}
function getColor2($c1,$c2,$i,$j,$c3,$n,$c4){
    if ($i<$j ) {
        if ($i+$j<$n-1) {
            return $c2;
         }
        
      }
      
}
function telephone ($tel){
      $tel=join("",array_filter(explode(" ",$tel))); //pour supprime les espaces
       //if(substr($tel,0-2)=='77' || substr($tel,0-2)== '78'){return "orange"; }
       if (preg_match('/^77|78/',$tel ) && preg_match('/^[0-9]{9}$/',$tel)) {
          return "orange";
       }
       if (preg_match('/^76/',$tel ) && preg_match('/^[0-9]{9}$/',$tel)) {
        return "tigo";
     }
     if (preg_match('/^70/',$tel ) && preg_match('/^[0-9]{9}$/',$tel)) {
        return "expresso";
     }
     return "invalid";     
}
function getTell($nbr){

    $t=explode(" ",$nbr);
    $t1=array(
        "orange"=>array(),
        "tigo"=>array(),
        "expresso"=>array(),
        "invalid"=>array(),
    );
    foreach ($t as $value) {
       $opperateur=telephone($value);
       
          $t1[$opperateur][]=$value;
    }
    return $t1;
}
function debut($t){
    $t=trim($t);
    if (preg_match('/^[A-Z]/',$t) && preg_match('/[\.]$/', $t)){
       
        return true; 
    }
   
    return false;  
}
function rePharase($nbr){

    $t=explode(" ",$nbr);
    $t1=array();
   for ($i=0; $i <count( $t); $i++) { 
      if (debut($t[$i])) {
       $t1[]=$t[$i];
      }
   }
    return $t1;
}
function myStrlen(string $chaine){
    $i=0;
    while (isset($chaine[$i])) {
        $i++;
    }
    return $i;
}
