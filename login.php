<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>visualizza sconto
    <script type="text/javascript" src="./controllo.js"></script>
</title>
<?php
if(isset($_POST['utente'])){
    $_SESSION["utente"] = $_POST['utente'];
}
if(isset($_POST['password'])){
    $_SESSION["password"] = $_POST['password'];
}//salvo utente e password come session e controllo se anno valore con isset
?>
<?php
   include "connessione.php";
$pwd= $_SESSION["utente"];
$pws= $_SESSION["password"];
$sql ="SELECT credito,tipo,idCliente
FROM Cliente 
WHERE Cliente.username='$pwd' AND Cliente.password='$pws'";
$check= $db->prepare($sql);
$check-> execute();
$row= $check -> fetch(PDO::FETCH_BOTH);
$_SESSION["idCliente"]=$row['idCliente'];
$_SESSION["tipo"]=$row['tipo'];
if($_SESSION["tipo"]== ""){//controllo se utente esiste se no riconduco all'index
    header("Location: ./index.html");
    die();
}
if($_SESSION["tipo"] == 'user'){
    echo "credito disponibile =$row[credito]$";
    echo  "<form action='./ricarica.php' method='POST'>
    <input type='credito' id='credito' name='credito'required>
    <input type='submit' value='ricarica credito'><br><br>
    </form>";
}
?>

<table id="data" class="table table-bordered table-striped">
<thead>
   
            <tr align="center">
              <th width="3%">ID</th>
              <th width="3%">TITOLO</th>
              <th width="3%">album</th>
              <th width="3%">genere 
              </th>
              <th width="3%">casa_discografica</th>
              <th width="3%">prezzo</th>
              <th width="3%">idArtista</th>
              <th width="3%">nome artista</th>
              <th width="3%">cognome artista</th>
              <th width="3%">periodo inizio disponibilita brano</th>
              <th width="3%">periodo fine disponibilita brano</th>
              
              <th width="3%"></th>
            </tr>
            </thead>
</head>

<body>
    <?php
    include "connessione.php";

    $sql ="SELECT  idBrano,titolo,album,genere,casa_discografica,prezzo,periodo_inizio,periodo_fine,idArtista,nomeAR,cognomeAR
    FROM Brano JOIN  Artista USING(idArtista)";
    

    $stmt= $db->prepare($sql);
    $stmt-> execute();


    while($row= $stmt -> fetch(PDO::FETCH_BOTH)){
        $brano=$row["idBrano"];
        echo "<tr>";
        echo "<td> $brano";
        echo "<td>$row[titolo]";
        echo "<td>$row[album]";
        echo "<td>$row[genere]";
        echo "<td>$row[casa_discografica]";
        echo "<td>$row[prezzo]$";
        echo "<td>$row[idArtista]";
        echo "<td>$row[nomeAR]";
        echo "<td>$row[cognomeAR]";
       
        
        if($_SESSION["tipo"] == 'user'){
            echo "<td>$row[periodo_inizio] ";
            echo "<td>$row[periodo_fine] ";
    
            $datacorrente="SELECT  CURRENT_TIMESTAMP ";   //query select current date
            $datacurrent = $db->prepare($datacorrente);
            $datacurrent-> execute();
            ($row_data= $datacurrent -> fetch(PDO::FETCH_BOTH));
            $data = substr($row_data["CURRENT_TIMESTAMP"], 0, 10);
            $data_dt = new DateTime($data);
            $data_pi = new DateTime($row['periodo_inizio']);
            $data_pf = new DateTime($row['periodo_fine']);
            if($row["periodo_inizio"] == NULL || $row["periodo_inizio"]=="0000-00-00"){//controllo data vuota
                $controllo="SELECT idBrano,idCliente
                FROM Brano_Cliente
                WHERE idBrano=$row[idBrano] AND idCliente= $_SESSION[idCliente]";
                $eseguicontrollo = $db->prepare($controllo);
                $eseguicontrollo-> execute();
                ($row_controllo= $eseguicontrollo -> fetch(PDO::FETCH_BOTH));//query select per idcliente e brano
                    if($row_controllo==false){

                            echo "<td><form action='./aqcuista.php' method='POST'>
                        <input type='hidden' value=' $brano' name='idBrano' id='idBrano'>
                        <input type='hidden' value='$_SESSION[idCliente]' name='idCliente' id='idCliente'>
                        <input type='submit' value='acquista'><br><br>
                        </form> <br> <br>";//button per l'acquista
                    }else{
                        echo "<td>acquistato";
                    }
            }
            elseif($data_dt<$data_pi|| $data_dt>$data_pf){//controllo se periodo disponibilita è coretto o no

                echo "<td>brano non disponibile";
           
            }
            else{
                $controllo="SELECT idBrano,idCliente
                FROM Brano_Cliente
                WHERE idBrano=$row[idBrano] AND idCliente= $_SESSION[idCliente]";
                $eseguicontrollo = $db->prepare($controllo);
                $eseguicontrollo-> execute();
                ($row_controllo= $eseguicontrollo -> fetch(PDO::FETCH_BOTH));
                    if($row_controllo==false){

                        echo "<td><form action='./aqcuista.php' method='POST'>
                    <input type='hidden' value=' $brano' name='idBrano' id='idBrano'>
                    <input type='hidden' value='$_SESSION[idCliente]' name='idCliente' id='idCliente'>
                    <input type='submit' value='acquista'><br><br>
                    </form> <br> <br>";//se sei nel periodo allora button acquista appare
                    }else{
                    echo "<td>acquistato";
            }
               
            }
        }
    
        
       
        if($_SESSION["tipo"]== 'amministratore'){//controllo se admin
            echo "<td><form method='POST' name='modulo1' onsubmit='return controllaDataInizio()' action='./update.php'>
            <input type='hidden' value=' $brano' name='idBrano' id='idBrano'>
            <input type='text' value=' $row[periodo_inizio]' name='periodo_inizio' id='periodo_inizio'></form> ";
        echo "<td><form action='./update2.php' method='POST'name='modulo2' onsubmit='return controlloDataFine()'>
        <input type='hidden' value=' $brano' name='idBrano' id='idBrano'>
        <input type='text' value=' $row[periodo_fine]' name='periodo_fine' id='periodo_fine'> </form>";//update delle date di validita brano utilizzando javascript 

        }
        echo "</tr>";
    }

   

    
        if($_SESSION["tipo"]== 'amministratore'){//aggiungi artista e brano
            echo  "<form action='./aggiungi.php' method='POST'>
                    <input type='submit' value='aggiungi brano'><br><br>
                    </form>";
            echo  "<br><form action='./aggiungiAR.html' method='POST'>
                    <input type='submit' value='aggiungi artista'><br><br>
                    </form>";

    
        }
    
        
    ?>

    </table>

     <style>
    body {background-color: lightblue;}
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}th, td {
  background-color: white;
}

    </style>
    <a href="index.html">
    <label>TORNA ALLA HOME</label>