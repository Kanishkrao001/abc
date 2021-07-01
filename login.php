<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Page</title>
  </head>
  <body>

    <?php

    include "basic_components/nav_bar.php";
    
    ?>
     <h1 style="text-align: center ">Enter the details for login</h1>
     <h5 style="text-align: center ">If not registered, then <a href="http://localhost/LOGIN/register.php" style = "text-decoration: none">Click Here</a></h5>

    <form action="details.php", method="post"> 
            <div class="form-group, mt-3 ml-3">
                <label for="email">Login ID</label>
                <input type="text" name="id" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your login ID">
            </div>
            <br>
            <div class="form-group mt-3 ml-3">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" >
                <small id="pass" class="form-text text-muted">We'll never share your password with anyone else.</small>
            </div>


            <button class="form-group mt-3 ml-3 btn btn-outline-primary" type="submit" class="btn btn-primary">Submit</button>
        </form>  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>
