<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("session.php");
        $nume=$_SESSION['nume'];
        $prenume =$_SESSION['prenume'];
        $email = $_SESSION['email'];
        $sql = "SELECT id,etaj, data_check_in, data_check_out
                FROM conturi c, rezervare r
                WHERE email = '$email'
                and r.user = c.id";
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);
        if($count == 0)echo "Nu există nicio rezervare înregistrată pentru $nume $prenume.";
        else{
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            while($row){
                $id = $row['id'];
                $etaj=$row['etaj'];
                $in = $row['data_check_in'];
                $out = $row['data_check_out'];
                $obj = "<div>
                        <p>Etaj: $etaj</p>
                        <p>Data check in: $in</p>
                        <p>Data chech out: $out</p>
                        <form FORM method='POST' action='deleterez.php'>
                            <button type='submit' value=$idxxx>Șterge rezervare</button>
                        </form>
                    </div>";
                echo obj;
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            }
        }
    ?>
    <br>    
    <a href="index.php">Înapoi la pagina principală</a>
</body>
</html>