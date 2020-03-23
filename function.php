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
function moyenne(array $tab)
{
    $somme = 0;
    $moyenne = 0;
    $i = 0;
    foreach ($tab as $key => $value) {
        $somme += $value;
        $i = $key;
    }
    $i++;
    $moyenne += $somme / $i;
    return $moyenne;
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
function pagination($tab, $nombreParPage,$page,$taille)
{
    $_SESSION['nombreTotal'] = $taille;
    $_SESSION['pageTotal'] = ceil($_SESSION['nombreTotal'] / $nombreParPage);
    if (isset($_GET[$page]) && $_GET[$page] > 0) // Si la variable $_GET['page'] existe... et ne contient que des chiffre
    {
        $_GET[$page] = intval($_GET[$page]);
        $_SESSION['pageCourant'] = $_GET[$page];  // page courant prend la page actuelle 
    } else {
        $_SESSION['pageCourant'] = 1;  // si non  elle prend 1
    }
    $_SESSION['debut'] = ($_SESSION['pageCourant'] - 1) * $nombreParPage; // de but de l'achiffage par page 
    echo '<br>';
    echo '<table class=affichePremier>';
    for ($i = $_SESSION['debut']; $i < $nombreParPage * $_SESSION['pageCourant']; $i += 10) {
        echo '<tr>';
        for ($j = $i; ($j < $i + 10 && $j < $taille); $j++) {
            echo '<td>' . $tab[$j] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    for ($i = 1; $i <= $_SESSION['pageTotal']; $i++) {
        if ($i == $_SESSION['pageCourant']) {
            echo ' <div class=" pagactive">' . $i . ' </div>';
        } else {
            echo ' <div class="paginationCenter"><a  href="navbar.php?'.$page.'=' . $i . '"> <div class="pagination">' . $i . ' </div></a> </div> ';
        }
    }
    echo '<br> <br> <br>';
}