<!-- <script type="text/javascript">
  function check() {
    if (document.getElementById('email').value == "") {
      document.getElementById('error').innerHTML = "this is an invalid mail";
    }
  }

  function check1() {
    if (document.getElementById('name').value == "") {
      document.getElementById('error1').innerHTML = "this is a required field";
    }
  }

  function checkpassword() {
    var pass = document.getElementById("pass").value;
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$%?*&])[A-Za-z\d@$%?*&]{8,20}$/;

    if (!re.test(pass)) {
      alert("Enter Password with the mentioned details");
      document.getElementById("pass").value = "";
    }
  }
</script> -->

<?php

 $success = false;

function test($data)
{
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "basic_components/server_connect.php";

  $username = $_POST['id'];
  $name = $_POST['name'];
  $no = $_POST['no'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];

  // CHECK IF EMAIL IS IN THE REQUIRED FORMAT
  $email = test($username);
  // echo $email;
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // $error_id = "<span class='error'>Please enter email in correct format.</span>";
    echo '<script>
      alert("Enter email in correct format");
    document.getElementById("id").value = "";
    </script> ';
    header("refersh: 5; location: http://localhost/LOGIN/register.php");
    exit();
  }

  // Check if name is in correct format ie ONLY LETTERS
  if (empty($name)) {
    // $error_name=  "<span class='error'>Please enter your name.</span>";
    echo '<script>
      alert("Enter the name. It can not be empty");
    document.getElementById("name").value = "";
    </script> ';
    header("Refresh: 5; location: register.php");
    exit;
  }
  else if(!ctype_alpha(trim($name)))
  {
    // $error_name=  "<span class='error'>Please enter only letters in your name.</span>";
    echo '<script>
      alert("Name should only contain leters ");
    document.getElementById("name").value = "";
    </script> ';
    header("Refresh: 5; location: register.php");
    exit;
  }

  // Check if in number only digits are present
  if (!empty($no)) {
    if (!is_numeric(trim($no))) {
      // $error_no =  "<span class='error'>Please enter numeric value.</span>";
      echo '<script>
          alert("enter only digits.Phone no can not have letters");
     document.getElementById("no")="";
      </script> ';
      header("Refresh: 5; location: register.php");
      exit();
    }
  }
  // CHECK IF PASSWORD HAS THE REQUIRED MIN QUALIFICATIONS
  if(!empty($pass))
  {
  if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pass)) {
    echo "Password must be at least 8 characters in length and must contain at least one number,
     one upper case letter, one lower case letter and one special character.";
    // header("location: register.php");
  } else {
    echo "Your password is good to go.";
  }
} else{
  header("location: register.php");
}

  if($pass != $cpass)
  {
    echo '<script>
          alert("Password do not match");
     document.getElementById("pass")="";
     document.getElementById("cpass")="";
      </script> ';
      header("Refresh: 5; location: register.php");
  }

  $checkid = "SELECT * FROM users WHERE Email = '$username' ";
  $res = mysqli_query($connect, $checkid);
  $rows = mysqli_num_rows($res);
  // if user already exists then break the loop
  if ($rows > 0) {
    echo '<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Username already exist</h4>
    <p>Please register with another username</p>
    <hr>
    <a href="http://localhost/LOGIN/register.php" style = "text-decoration: none"> Click to Register</a>
     </div>';
  // } else if (!empty($user) and !empty($pass) and !empty($cpass)) {
  //   echo '<div class="alert alert-danger" role="alert">
  //     <h4 class="alert-heading">Enter all the fields </h4>
  //     <p>You wont be able to register untill you fill all the fields/p>
  //     <hr>
  //     <a href="http://localhost/LOGIN/register.php" style = "text-decoration: none"> Click to Register</a>
  //      </div>';
  // } 
  } else
    if ($pass == $cpass) {
    // password matches, insert into database
    $sql = "INSERT INTO users (`Email`, `Name`, `Phone_no`, `Pass`) VALUES ('$username', '$name', '$no', '$pass')";
    // $result = mysqli_query($connect, $sql);
    if (mysqli_query($connect, $sql)) {
      $success = true;
    }
  } else {
    //  echo "Password Doesn't Match";
    echo '<div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Password Incorrect </h4>
      <p>Please enter correct password</p>
      <hr>
      <a href="http://localhost/LOGIN/register.php" style = "text-decoration: none"> Click to Register</a>
       </div>';
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Register</title>

  <style>
    .error{
      color: red;
    }
  </style>
</head>

<body>
  <?php include "basic_components/nav_bar.php";  ?>
  <?php
  if ($success) {
    echo '
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>You have successfully registered with us....</p>
        <hr>
        <a href="http://localhost/LOGIN/login.php" style = "text-decoration: none"> Click to login</a>
      </div> ';
  }
  ?>

  <!-- we will add the details to the database of the user -->
  <h2 style="text-align: center; color: darkseagreen;">Enter the mentioned details for registration</h2>

  <!-- <div class="alert alert-success" role="alert">Your data is successfully submitted ! </div> -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <form action="register.php" , method="post">
    <div class="form-group, mt-3 ml-3">
      <label for="email">Login ID</label>
      <input type="text" name="id" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your login ID">
      <!-- <span id="error"></span> -->
       <!-- <?php echo $error_id; ?>  -->
    </div>
    <div class="form-group, mt-3 ml-3">
      <label for="name">Enter Your Name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter your Name">
      <!-- <span id="error1"></span> -->
      <!-- <?php echo $error_name; ?> -->
    </div>
    <div class="form-group, mt-3 ml-3">
      <label for="no">Enter Your Phone Number</label>
      <input type="text" name="no" class="form-control" id="no" placeholder="Enter your Name">
      <!-- <?php echo $error_no; ?> -->
    </div>

    <div class="form-group mt-3 ml-3">
      <label for="pass">Password</label>
      <input type="text" name="pass" class="form-control" id="pass" placeholder="Password">
      <small id="pass" class="form-text text-muted">Your password should be between 8-15 characters. It shoul have atleast
        1 small character, 1 capital character and 1 special character. We'll never share your password with anyone else.</small>
    </div>

    <div class="form-group mt-3 ml-3">
      <label for="cpass">Confirm Password</label>
      <input type="text" name="cpass" class="form-control" id="cpass" placeholder="Confirm your Password">

    </div>

    <button class="form-group mt-3 ml-3 btn btn-outline-primary" type="submit" class="btn btn-primary">Submit</button>
  </form>



  <!-- Optional JavaScript 
    jQuery first, then Popper.js, then Bootstrap JS
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->


</body>

</html>