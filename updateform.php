<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update Form</title>
</head>

<body>

<?php 
     session_start(); include "basic_components/nav_bar.php";
?>

 <h3 style="text-align: center">Enter the details for update</h3>

    <form action="update.php" , method="post">
        <div class="form-group, mt-3 ml-3">
                <label for="email">Login ID</label>
                <input type="text" name="id" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your login ID">
        </div>
        <div class="form-group mt-3 ml-3">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" >
        </div>
        <div class="form-group, mt-3 ml-3">
            <label for="name">Enter the updated Name</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter your name">
        </div>
        <br>
        <div class="form-group mt-3 ml-3">
            <label for="no">Enter your new number</label>
            <input type="number" name="no" class="form-control" id="no" placeholder="Number">
        </div>


        <button class="form-group mt-3 ml-3 btn btn-outline-primary active" type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

</body>

</html>