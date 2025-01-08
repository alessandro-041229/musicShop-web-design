<!DOCTYPE html>
<html>
<head>
    <title>elimina
</title>
</head>

<body>
    <?php
    include "connessione.php";
    $titolo=$_POST['titolo'];
    $album=$_POST['album'];
    $genere=$_POST['genere'];
    $casa_discografica=$_POST['casa_discografica'];
    $periodo=$_POST['periodoIN'];
    $periodoFIN=$_POST['periodoFIN'];
    $prezzo=$_POST['prezzo'];
  
    $idArtista=$_POST['idArtista'];
    $sql = "INSERT INTO Brano(titolo,album,genere,casa_discografica,prezzo,periodo_inizio,periodo_fine,idArtista)
            VALUES ('$titolo','$album','$genere','$casa_discografica',$prezzo,'$periodo','$periodoFIN',$idArtista);";

    echo $sql;
    $stmt= $db->prepare($sql);
    $stmt->execute();
    echo "<h1> brano aggiunto con sucesso</h1>";
    ?>
<a href="login.php">
<label>torna alla pagina di visualizzazione brani</label>