<?php
    $id=$_POST["id"];
    $sql = "DELETE FROM rezervare WHERE id=$id";
    if (mysqli_query($db, $sql)) {
        header("Location: rezervari.php");
      } else {
        echo "Eroare la stergere: " . mysqli_error($db);
      }
    
?>