<?php
    include("config.php");
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
       
       $email = mysqli_real_escape_string($db,$_POST['email']);
       $parola = mysqli_real_escape_string($db,$_POST['parola']); 
       
       $sql = "SELECT id FROM conturi WHERE email = '$email' and parola = '$parola'";
       $result = mysqli_query($db,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       //$active = $row['active'];
       
       $count = mysqli_num_rows($result);
       
       
         
       if($count == 1) {
          $_SESSION['email'] = $email;

          $sql = "SELECT tip_cont,nume,prenume FROM conturi WHERE email = '$email' and parola = '$parola'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $_SESSION['tip_cont']=$row['tip_cont'];
          $_SESSION['nume']=$row['nume'];
          $_SESSION['prenume']=$row['prenume'];

          header("location: index.php");
       }else {
          $error = "Informatii de login invalide!";
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login HoteldelMar</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <FORM method="POST" action="" id='login'>
        <table border=0 width="40%" align="left" id='logintabel'>
            <tr><td colspan=2><h2>Login Hotel del Mar</h2></td></tr>
            <tr>
                <td with="30%">Email:</td>
                <td with="70%"><INPUT TYPE="text" name="email"></td>
            </tr>
            <tr>
                <td>Parola:</td>
                <td><INPUT TYPE="text" name="parola"></td>
            </tr>
            <tr>
                <td colspan=2><INPUT TYPE="submit" VALUE="Trimite"></td>
            </tr>
        </table>
    </form>
</body>
</html>