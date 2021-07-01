<?php

session_start();
// session_unset();
if(isset($_SESSION['active']))
{
    // echo "set";
    ;
}
else{
    header("location: login.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome <?php echo $_SESSION['activeuser']; ?></title>
  </head>
  <body>

    <?php

    include "basic_components/nav_bar.php";
    echo "<br>";
    echo "This is about the orgainzation";
    echo "<br>";
    if($_SESSION['active'])
    {
        echo "you are logged in ";
        echo "<br>";
        echo 'Clich here to <a class= "mb-3"  style = "text-decoration: none" href="logout.php">Logout</a> ';
    }
    else{
        header("location: login.php");
    }
    
    ?>
 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>