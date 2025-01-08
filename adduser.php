<!DOCTYPE html>
<html>
<head>
    <title>elimina
</title>
</head>

<body>
    <?php
    include "connessione.php";
    $username=$_POST['username'];
    $nome=$_POST['nome'];
    $cognome=$_POST['cognome'];
    $data_nascita=$_POST['data_nascita'];
    $indirizzo=$_POST['indirizzo'];
    $password=$_POST['password'];
   
    $sql = "INSERT INTO Cliente(username,nome,cognome,data_nascita,indirizzo,tipo,password,credito)
            VALUES ('$username','$nome','$cognome','$data_nascita','$indirizzo','user','$password',0)";

    $stmt= $db->prepare($sql);
    $stmt->execute();
   
    echo "<h1> user creato con sucesso</h1>";
    ?>
<a href="index.html">
    <label>TORNA ALLA HOME</label>