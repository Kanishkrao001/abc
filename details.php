<?php

function test($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
include "basic_components/nav_bar.php";
// $user = $_POST['id'];
//     $pass = $_POST['pass'];

//     echo $user;
//     echo $pass;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "basic_components/server_connect.php";

    $user = $_POST['id'];
    $pass = $_POST['pass'];
    // echo $user;
    // echo $pass;


    if (empty($user) or empty($pass)) {
        // echo '<div class="alert alert-success" role="alert">Your data is in our databse. Now you are Loggged in ! </div>';
        // echo '<script type="text/javascript">  alert("Enter details in required field");</script>';
        // used javascript to show the above message
        // echo "<script>setTimeout('document.location.href = http://localhost/LOGIN/login.php;',500);</script>";
        echo '
            <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">enter the details</h4>
            <p>fields cant be empty</p>
            <hr>
            </div>';
            header("Refresh: 2; url= login.php");
            exit();
    }



    $email = test($_POST["id"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       echo '<script>
        alert("Enter email in correct format");
      document.getElementById("id").value = "";
      </script> ';
      header("location: login.php");
      exit();
    }

    //  check for password
    // if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pass)) {
    //     echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
    //    } else {
    //     echo "Your password is strong.";
    //    }
    $getpass = "SELECT Pass FROM users WHERE Email = '$user'";
    $res = mysqli_query($connect, $getpass);
    $rw = mysqli_num_rows($res);

    if($rw > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
            $respass = $row['Pass'];
            {
                if($pass!=$respass)
                {
                    echo '<div class="alert alert-danger" role="alert">
                    Enter correct pssword...!!!!
                    <hr>
                    </div>';
                    header("refresh: 2; url=login.php");
                    exit();
                }
            }
       
        }
    }

    $getdetails = "SELECT * FROM users WHERE Email = '$user' AND Pass = '$pass' ";
    //    var_dump($getdetails);
    $result = mysqli_query($connect, $getdetails);
    //    var_dump($result);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        // when proper inputs are entered then start he session and save the values
        session_start();
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['Name'];
        }
        $_SESSION['active'] = true;
        $_SESSION['activeuser'] = $name;

        // echo '<div class="alert alert-success" role="alert">Your data is in our databse. Now you are Loggged in ! </div>';

        // if i redirect to another page
        header("Location: Welcome.php");

        //     while($row = mysqli_fetch_array($result))
        //     {
        //         echo $row['Email'];
        //         echo "<br>";
        //         echo $row['Name'];
        //         $name = $row['Name'];

        //         $_SESSION['activeuser'] = $name;

        //         echo "<br>";
        //         echo $row['Phone_no'];
        //         echo "<br>";
        //         echo 'Make sure to logout after your work is done
        //         <a class= "mb-3"  style = "text-decoration: none" href="logout.php">Logout</a> ';
        //     }
    } else {
        echo '<div class="alert alert-danger" role="alert">
        You are not registerd with us......!
        <hr>
        <a href="http://localhost/LOGIN/register.php" style = "text-decoration: none"> Click to Register</a>
        </div>';
        echo "<br>";
    }
}
