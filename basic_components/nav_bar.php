<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title></title>
  <style>
    body {
      background-color: lightcyan;
    }

    .container {
      display: contents;
      width: 100%;
      margin: auto;
    }

    .con {
      width: 100%;
      margin: auto;
    }
  </style>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark my-2 con">
      <!-- <a class="navbar-brand" href="#">ABC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
      <img src="basic_components/abc.jpg" width="35" height="35" alt="MY Photo" style="border: solid 2px grey">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href=Welcome.php>Welcome <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="about.php"> About </a>
          </li>
          <?php if(!isset($_SESSION['active']) or $_SESSION['active']!=true) { ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="register.php">Register</a>
          </li> 
          <?php } else{ ?>
            <li class="nav-item">
            <a class="nav-link " href="update.php">Update Details</a>
          </li>
          <button class="btn btn-outline-success my-2 my-sm-0" onclick="document.location='logout.php' ">Sign Out</button>
       <?php } ?>
          </li>
        </ul>
      </div>
    </nav>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>