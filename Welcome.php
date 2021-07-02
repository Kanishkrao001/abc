 <?php
  session_start();
  //  session_unset();
  if (isset($_SESSION['active']) == true) {
      // echo "you are logged in";
    ;
  } else {
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
   <style>
     img {
       border-radius: 50%;
     }

     .page {
       display: flex;
       width: 40%;
       /* flex-wrap: wrap; */
       /* border: 1px dashed rgb(226, 37, 37); */

       justify-content: space-between;
       /* justify-content: space-around;  */
       /* justify-content: space-evenly; */
       /* float: left; */
     }

     .ele1 {
       display: flex;
       margin-top: auto;
       height: 5rem;
       align-self: flex-start;

       /* background-color: linen; */
     }

     .ele2 {
       color: darkviolet;
       font-size: 20px;
       font-family: sans-serif;
       margin-top: 50px;
       /* background-color: lightpink; */
     }

     .ele3 {
       color: forestgreen;
       font-size: 20px;
       font-family: serif;
       margin-top: 50px;
        margin-right: 28px;
        /* background-color: lightskyblue; */
     }
     .pass{
       float: right;
       margin-top: -51.2%;
       margin-right: 10px;
     }
     .blink{
      animation: blinker 1s linear infinite;
     }
     @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
   </style>
 </head>

 <body>

   <?php

    include "basic_components/nav_bar.php"; ?>

   

<?php
   
    // echo $_SESSION['activeuser'] . " ";
    // echo $_SESSION['active'];
    echo "<br>";
    echo '<p style = " background-color:white ;text-align: center; font-size:30px">Welcome to your portal......</p>';
    echo "<br>";
    echo '<p style = "background-color: lightgreen; padding-left:15px; font-size:25px">Here is the list of users </p>';
    echo "<br>";

    include "basic_components/server_connect.php";
    ?>

    <div class="page">
    <div class="ele1">
      <img src="basic_components/av1.jpg" alt="photo">
    </div>
    <div class="ele2">
      <h4>Name</h4>
    </div>
    <div class="ele3">
        <h4>Mobile No</h4>
    </div>

  </div>

<?php
    $sql = "SELECT Name, Phone_no FROM users";
    $res = mysqli_query($connect, $sql);

    $rows = mysqli_num_rows($res);

    while ($row = mysqli_fetch_array($res)) {

      //  echo "Name of the User : ". $row['Name']. "--- Phone no is :" . $row['Phone_no'];
      //  echo "<br>";  ?>

      <div class="page">
      <div class="ele1">
        <img src="basic_components/av1.jpg" alt="photo">
      </div>
      <div class="ele2">
        <p>Name - <?php echo $row['Name'] ?></p>
      </div>
      <div class="ele3">
          <p>Mobile no - <?php echo $row['Phone_no'] ?></p>
      </div>
  
    </div>
     <?php
    }

    // echo 'To update your data Click <a class= "mb-3"  style = "text-decoration: none" href="updateform.php">Update</a>';
    // echo "<br> <br>";
    echo "<br>";
    echo '
    <div class="pass">
     To update the password Click <a class= "mb-3 blink"  style = "text-decoration: none" href="update_pass.php">Update Password</a>
    </div> ';
    echo "<br> <br> <br>";
    echo '<h4 style="text-align: center"><blink>Make sure to logout after your work is done.</h4>';
    echo "<br>";

    ?>


   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


 </body>

 </html>