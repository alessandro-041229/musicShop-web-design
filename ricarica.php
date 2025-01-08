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
    $ricarica=$_POST['credito'];
    $pwd=$_SESSION['utente'];
    $sql= "UPDATE Cliente
           SET credito=Cliente.credito+  $ricarica
           WHERE username= '$pwd'";//update per ricaricare il credito

               $stmt= $db->prepare($sql);
               $stmt-> execute();
    echo "<h1> credito aggiunto</h1>";
    ?>
<a href="login.php">
<label>torna alla pagina di visualizzazione brani</label>