<!DOCTYPE html>
<html>
<head>
    <title>elimina
</title>
</head>

<body>
    <?php
    include "connessione.php";
    $nome=$_POST['nomeAR'];
    $cognome=$_POST['cognomeAR'];
 
    $sql = "INSERT INTO Artista(nomeAR,cognomeAR)
            VALUES ('$nome','$cognome');";

    $stmx= $db->prepare($sql);
    $stmx->execute();
    echo "<h1> artista aggiunto con sucesso</h1>";
    ?>
<a href="login.php">
<label>torna alla pagina di visualizzazione brani</label>