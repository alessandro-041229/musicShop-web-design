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
  
    $pwc=$_SESSION["idCliente"] ;
    $sql = "SELECT titolo,prezzo
            FROM  Brano
            WHERE idBrano =$pwd";
    
    $stmt= $db->prepare($sql);
    $stmt->execute();
    $row= $stmt -> fetch(PDO::FETCH_BOTH);
    $prezzo=$row['prezzo'];
    $titolo=$row['titolo'];

    $selezionacredito = "SELECT credito
            FROM Cliente
            WHERE idCliente=$pwc";//query select credito
  
    
    $credito= $db->prepare($selezionacredito);
    $credito->execute();

    ($row= $credito -> fetch(PDO::FETCH_BOTH));
        if($prezzo<=$row['credito']){//controllo se credito è sufficiente

            $sottrai= "UPDATE Cliente
            SET credito=Cliente.credito - $prezzo
            WHERE idCliente =$pwc";//aggiorno il prezzo con una update 
            

        $sott= $db->prepare($sottrai);
        $sott->execute();
        $inserimento = "INSERT INTO Brano_Cliente(idBrano,idCliente)
        VALUES
        ($pwd,$pwc)";//inserisco la nuova row sulla tabella brano_Clienti cosi da poter salvare l'acquisto
        
         
         $insert= $db->prepare($inserimento);
         $insert->execute();
         echo "hai acquistato il brano $titolo con sucesso ";       

    }else{
        echo "impossibile acquistare credito insufficiente";
        
    }

    

    

        

    ?>
    
<br><br><a href="login.php">
    <label>torna alla pagina di visualizzazione brani</label>
