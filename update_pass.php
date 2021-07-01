<?php
include "basic_components/nav_bar.php";
include "basic_components/server_connect.php";

if($_SERVER['REQUEST_METHOD']=="POST")
{

  $oldpass = $_POST['opass']; 
  $npass = $_POST['npass'];
  $cnpass = $_POST['cnpass'];

  if(empty($oldpass) or empty($npass) or empty($cnpass))
  {
    echo "Fill all the details for changing the password";
    header("location: Welcome.php");
  }

  else if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $npass)) 
  {
    echo '
    <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Password not in required format</h4>
    <p>Please enter password again</p>
    <hr>
    </div>';
    header("Refresh: 2; url= update_pass.php");
  }

  else if($npass != $cnpass)
  {
    echo '
    <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Password does not matcht</h4>
    <p>Please enter same password</p> <hr> </div>';
    
  }
  else{
    // all things are correct
    // Now check whehter old password is correct or not 
    $checkid = "SELECT * FROM users WHERE Pass = '$oldpass' ";
    $res = mysqli_query($connect, $checkid);
    $rows = mysqli_num_rows($res);
    // if user already exists then break the loop
    if ($rows == 0)
    { // no such password exist
      echo '
    <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Please enter correct password to continue this transaction</h4>
    <hr> </div>';
    }
    else{
      $sql = "UPDATE users SET Pass = '$npass' WHERE Pass = '$oldpass' ";
      $res = mysqli_query($connect, $sql);
      if($res)
      {
        echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Password changed</h4>
        <hr> </div>';
        header("Refresh: 2; url= logout.php");
      }
      else{
        echo '
        <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Password does not matcht</h4>
    </div>';
      }
    }
  }
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

    <title>Update Password <?php echo $_SESSION['activeuser']; ?></title>
  </head>
  <body>

     <h1 style="text-align: center ">Enter the details for updation</h1>
     
    <form action="update_pass.php", method="post"> 
    <div class="form-group mt-3 ml-3">
                <label for="pass">Old Password</label>
                <input type="password" name="opass" class="form-control" id="pass" placeholder="Password" >
            </div>
            <br>
            <div class="form-group mt-3 ml-3">
                <label for="pass">New Password</label>
                <input type="password" name="npass" class="form-control" id="pass" placeholder="Password" >
                <small id="pass" class="form-text text-muted">It should be of min 8 character.It should have atleast 1 capital 1 small and 1 
                  special character.</small>
            </div>
            <br>
            <div class="form-group mt-3 ml-3">
                <label for="pass">Confirm Password</label>
                <input type="password" name="cnpass" class="form-control" id="pass" placeholder="Password" >
                
            </div>


            <button class="form-group mt-3 ml-3 btn btn-outline-primary" type="submit" class="btn btn-primary">Submit</button>
        </form>  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>
