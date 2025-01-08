<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>elimina
</title>
</head>

<body>
    <?php
    include "connessione.php";
    $pwd=$_POST['idBrano'];
    $pwc=$_POST['periodo_fine'];

    $sql= "UPDATE Brano
           SET periodo_fine= '$pwc'
           WHERE idBrano= $pwd";

               $stmt= $db->prepare($sql);
               $stmt-> execute();
    echo "<h1>data aggiornata</h1>";
    ?>
<a href="login.php">
<label>torna alla pagina di visualizzazione brani</label>