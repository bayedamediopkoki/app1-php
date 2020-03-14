<?php
session_start();
        $p=isset($_GET['p'])?$_GET['p']:'jouere1'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<!-- <link rel="stylesheet" href="jouere">	 -->
<!-- <link rel="stylesheet" href="jouere1.css"> -->
<?php if($p=="jouere" || $p=="app1" || $p=="app2"):?>
    <link rel="stylesheet" href="jouere.css">
<?php endif;?>
<?php if($p=="jouere1" || $p=="jouere1"):?>
    <link rel="stylesheet" href="jouere1.css">
<?php endif;?>
</head>
<body>
<div id="general">
        <nav class="nav">
            <ul>
                <li>
                    <a href="?p=exo1">exo1</a>
                    <a href="?p=exo2">exo2</a>
                    <a href="?p=exo3">exo3</a>
                    <a href="?p=exo4">exo4</a>
                    <a href="?p=exo5">exo5</a>
                    <a href="?p=app1">app1</a>
                    <a href="?p=app2">app2</a>
                    <a href="?p=jouere1">conection</a>
                    
                </li>
            </ul>
        </nav>
</div>
<?php
require_once("$p.php");
?>
</body>
</html>