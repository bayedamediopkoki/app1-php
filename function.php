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
//functiom de recherche nu chaine dans une chaine 
function recherche ($t){
  
   
    for ($i=0; $i <strlen($t) ; $i++) { 
       if ( strtolower ($t[$i]=='m') ){  //convertir en miniscule
          return true;
       }
    }
    return false;
}
//functiom de recherche nu caractere  se trouve dans une chaine  ou pas
function rechercher ($t,$caracetre){ 
    $ok=false;
    for ($i=0; (isset($t[$i])) ; $i++) { 
       if ( $t[$i]==$caracetre) {  
         $ok=true;
       }
    }
    return $ok;
}
// functiom de recherche nu caractere m dans un chaine
function nbrM($chaine){
    $cpt=false;
      for ($i=0; $i <tailleTableu($chaine) ; $i++) { 
        if ($chaine[$i]=="m" || $chaine[$i]=="M") {
          $cpt=true;
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
function alphbetique ($c){
    $tabAlpha = ['a','c','d','e','f','g','q','w','r','t','y','u','i','o','p'
    ,'s','h','j','k','l','z','x','v','n','m'];
    $ok=false;
    for ($i=0; $i < count($tabAlpha) ; $i++) { 
       if ($tabAlpha[$i]==$c) {
        $ok=true;
       }
    }
        return $ok;
}
function myExplode(string $separateur, string $texte)
{
    $compteur=0;
    $i= 0;
    $texteTab =[];
    while(isset($texte[$compteur])) {
        $texteTab[$i]=@$texte[$compteur];
        $compteur++;
        while (@$texte[$compteur] !=$separateur && isset($texte[$compteur])) {
            while((@$texte[$compteur] ==' ' && isset($texte[$compteur+1]) && $texte[$compteur+1]== ' ' )|| !isset($texte[$compteur+1])&& isset($texte[$compteur]) ) { 
                $compteur++;
            }           
            if (@$texte[$compteur] !=$separateur ) {
                $texteTab[$i].=@$texte[$compteur];
                $compteur++;
            }     
        }
           $texteTab[$i].=@$texte[$compteur];
            $i++;
           $compteur++;
    }
    return $texteTab;
}
// CONVERTIRE UNE CHAINE DE MINISCULE EN MAJUSCULE
function majuscules ($chaine){
   for ($i=0; $i< strlen($chaine); $i++)  
    {  
        if ($chaine[$i] >= "a" &&  $chaine[$i] <= "z")    
          $code=ord($chaine[$i])-32;
          echo chr($code); 
    } 
    
}
// CONVERTIRE UNE CHAINE DE MAJUSCULE EN MINISCULE
function miniscule ($chaine){
    $code="";
    for ($i=0; $i< strlen($chaine); $i++)  
     {  
         if ($chaine[$i] >= "A" &&  $chaine[$i] <= "Z")    
           $code=ord($chaine[$i])+32;
           echo chr($code); 
     }  
 }
function craMajuscules ($car){
    for ($i=0; $i< strlen($car); $i++) { 
     {
         if ($car[$i] >= 97 &&  $car[$i] <= 122)    
             //Convertir en majuscules
            $car[$i]=$car[$i]-32;     
     } 
 }
 return $car;
 }
 // la taille d'une tablaeu ou une chaine
 function tailleTableu ($tab){
     $cpt=0;
     for ($i=0; (isset($tab[$i])); $i++) { 
    {
            $cpt=$cpt+1;     
     } 
 }
 return $cpt;
 }
 
 //convertire une caractere en mini
 function minEnMaj($carractere)
{
    $lettre = [
        "a" => "A", "b" => "B", "c" => "C", "d" => "D", "e" => "E", "F" => "F", 
        "g" => "G", "h" => "H", "i" => "I", "j" => "J", "k" => "K", "l" => "L", 
        "m" => "M", "n" => "N", "o" => "O", "p" => "P", "q" => "Q", "r" => "R", 
        "s" => "S", "t" => "T","u"=>"U", "v"=>"V","w"=>"W","x"=>"X","y"=>"Y","z"=>"Z"
    ];
    foreach ($lettre as $key => $value) {
        if ($key== $carractere) {
            $carractere= $value;
        break;
        }
        elseif ($value == $carractere) {
            $carractere= $key;
        break;
        }
    }
  return $carractere;
} 
function entirPositif ($val){
    $ok=false;
    if ($val>0) {
       $ok=true;
    }
    return $ok;
}
//la taille d'une chaine
function myStrlen($chaine){
    $i=0;
    while (isset($chaine[$i])) {
        $i++;
    }
    return $i;
}
//retourner le nombre de caractere d une chaine
function nbrCaraCahine ($carractere){
    $n=0;
    for ($i=0; (isset($carractere[$i])); $i++) { 
       $n=$n+1;
    }
    return $n;
}
//function qui teste is numerique ou pas 
function is_numerique($nbr){
   $number= ($nbr >= '0' && $nbr <= '9')?true : false;
    return $number;
}
//function qui teste is caractere ou pas  
function isCaractere($val)
{
  $teste = ($val >= 'a' || $val >= 'A' && $val <='z' ||$val >= 'Z' )? true : false;   
    return $teste;
}
 // teste une chaine est commence par une lattre majuscule et de terminer un .
function isPharase($chaine){
    $pharas = false;
    for ($i=0;$i<myStrlen($chaine); $i++) { 
     if ($chaine[0] >= 'A' && $chaine[0] <= 'Z' ){
    if (dernierCaracter($chaine)=='.'){
        $pharas = true;
       
     }
    }
}
   return $pharas; 
} 

// renvoier le derniere element d'une chaine
function dernierCaracter($string)
{
    return $string{myStrlen($string)-1};
}
// teste une chaine est miniscule ou pas
function is_lower($car){
    return ($car >= 'a' && $car <='z' );
}
//teste une chaine est masujcule ou pas
function is_uper($car){
    return ($car >= 'A' && $car <= 'Z');
}
function inverse_case($carac){
    for ($fin=0,$i='a',$j='A'; $fin<26 ; $i++,$j++,$fin++) { 
       if ($carac==$i) {
          return $j;
       }
       if ($carac==$j) {
        return $i;
     }
    }
    return $carac;
}
// function pemetre de enleve des espaces d'une chaine
function my_trim($chaine){
    $retour="";
    for ($i=0; $i <tailleTableu($chaine) ; $i++) { 
       if (!($chaine[$i]==" ")) {
        $retour .= $chaine[$i];
       }
    }
    echo $retour;
}
function is_valider($chaine){
    for ($i=0; $i <myStrlen($chaine); $i++) { 
        if( (!is_lower($chaine[$i])) && (!is_uper($chaine[$i]))){
            return false;
        }
    }
    return true;
}

