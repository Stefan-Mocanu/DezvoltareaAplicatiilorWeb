<?php
    include("config.php");
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
       
       $email = mysqli_real_escape_string($db,$_POST['email']);
       $parola = mysqli_real_escape_string($db,$_POST['parola']); 
       
       $sql = "SELECT id FROM conturi WHERE email = '$email' and parola = '$parola'";
       $result = mysqli_query($db,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $active = $row['active'];
       
       $count = mysqli_num_rows($result);
       
       
         
       if($count == 1) {
          session_register("email");
          $_SESSION['login_user'] = $email;

          $sql = "SELECT tip_cont,nume,prenume FROM conturi WHERE email = '$email' and parola = '$parola'";
          $result = mysqli_query($db,$sql);
          

          $_SESSION['tip_cont']=$result[0]['tip_cont'];
          $_SESSION['nume']=$result[0]['nume'];
          $_SESSION['prenume']=$result[0]['prenume'];

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
</head>
<body>
    <FORM method="POST" action="">
        <table border=0 width="40%" align="left">
            <tr>
                <td with="30%">email* :</td>
                <td with="70%"><INPUT TYPE="text" name="email"></td>
            </tr>
            <tr>
                <td>Parola* :</td>
                <td><INPUT TYPE="text" name="parola"></td>
            </tr>
            <tr>
                <td><INPUT TYPE="submit" VALUE="send"></td>
            </tr>
        </table>
    </form>
</body>
</html>