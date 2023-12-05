<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HoteldelMar</title>
</head>
<body>
    <?php
        $nume=$_SESSION['nume'];
        $prenume =$_SESSION['prenume'];
        $str ="<p>Bună ziua $nume $prenume!</p>";
        echo $str;
        switch($_SESSION['tip_cont']){
            case 0: // client, default la inregistrare
                // buton care trimite catre o pagina cu rezervarile create de catre client, cu posibilitatea de anulare
                // formular creare rezervare
                
                echo    "<a href='rezervari.php'>Vezi rezervari";
                
                break;
            case 1: // angajat la curatenie
                // vede ce camere/etaje trebuie sa curete in ziua curenta
                
                break;
            case 2: // maneger, poate crea conturi de angajat
                 
                break;
            case 3: // receptioner
                // poate vedea rezervarile din ziua curenta, le poate confirma la check in
                // vede camerele libere 
                
            }
    ?>
    
    <a href="logout.php">Logout</a>
</body>
</html>