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
        echo '<p>';
        echo $_SESSION['nume'];
        echo '</p>';
    ?>
</body>
</html>