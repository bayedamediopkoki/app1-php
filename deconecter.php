<?php

session_start ();
//session_destroy();
unset($_SESSION["login"]);

unset($_SESSION["mod"]);

header("Location:indexadmi.php");

   exit();

 ?>  