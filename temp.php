<?php

include "basic_components/server_connect.php";

$user = $_POST['id'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];

echo $user;
echo "<br>";
echo $pass;
echo "<br>";
echo $cpass;

// if cpass and pass matches then we will add this entry in database
if($pass == $cpass and !empty($pass) and !empty($user) and !empty($cpass))
{
  $sql = "INSERT INTO users (Email, Pass) VALUES ('$user', '$pass')";

  if(mysqli_query($connect, $sql))
  {
      echo "Successfully registered";
      echo "<br>";
  }
  else
  {
      echo "Please Enter correct password";
      echo "<br>";
  }
}
else{

    // echo "please enter the details";
    header("Location : http://localhost/LOGIN/login.php");
}


 if(!isset($_SESSION['active']) or $_SESSION['active'] != true)
        {
            header("location: login.php");
            exit();
        } else { header("location: Welcome.php"); } 
        
?>

onblur="check()"
onchange=checkpassword() 