<!DOCTYPE html>
<html>
<head>
    <title>insert</title>
</head>

<body>
    <form action="./aggiungibr.php" method="POST">
        <input type='text' value='titolo' name='titolo' id='titolo'required>
        <input type='text' value='album' name='album' id='album' required>
        <input type='text' value='genere' name='genere' id='genere' required>
        <input type='text' value='casa_discografica' name='casa_discografica' id='casa_discografica'required>
       data inizio: <input type='date' value='periodoIN' name='periodoIN' id='periodoIN'>
       data fine: <input type='date' value='periodoFIN' name='periodoFIN' id='periodoFIN'>
        <input type='text' value='prezzo' name='prezzo' id='prezzo'required>
        <?php
        include "connessione.php";
            $sql = "SELECT DISTINCT idArtista
                    FROM artista";
            $stmx = $db->prepare($sql);
            $stmx->execute();
            if ($stmx->rowCount() == 0) {
                echo "Non ci sono artisti";
            } else {
                echo "<select name='idArtista' id='idArtista'>";
                while ($row = $stmx->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='$row[idArtista]''>$row[idArtista]'</option>";
                }
                echo "</select>";
            }
            $stmx->closeCursor();
        ?>
        <input type='submit' value='aggiungi'><br><br>
        </form>
   <br><br>
</form>
</body>
</html>