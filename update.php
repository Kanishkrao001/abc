<?php

    include "basic_components/server_connect.php";
    $email = $_POST['id'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $no = $_POST['no'];
    
    if(empty($email) or empty($pass))
    {
      echo '
      <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">email and pass can not be empty</h4>
      <p>enter the fields</p>
      <hr> <hr>
      </div>';
      header("Refresh: 2; url= update.php");
    }
    // name validation
    // if (empty($name)) {
    //     // $error_name=  "<span class='error'>Please enter your name.</span>";
    //     echo '<script>
    //       alert("Enter the name. It can not be empty");
    //     document.getElementById("name").value = "";
    //     </script> ';
    //     header("Refresh: 5; location: Welcome.php");
    //     exit;
    //   }
     if(!ctype_alpha(trim($name)))
      {
        // $error_name=  "<span class='error'>Please enter only letters in your name.</span>";
        echo '<script>
          alert("Name should only contain leters ");
        document.getElementById("name").value = "";
        </script> ';
        header("Refresh: 5; location: Welcome.php");
        exit;
      }

      if (!empty($no)) {
        if (!is_numeric(trim($no))) {
          // $error_no =  "<span class='error'>Please enter numeric value.</span>";
          echo '<script>
              alert("enter only digits.Phone no can not have letters");
         document.getElementById("no")="";
          </script> ';
          header("Refresh: 5; location: Welcome.php");
          exit();
        }
    }

    $sql = "UPDATE users SET Name = '$name' , Phone_no = '$no' WHERE Email = '$email' and Pass = '$pass' ";
    $res = mysqli_query($connect, $sql);
    // var_dump($res);

    if ($res) {
        echo "record updated";
        $_SESSION['activeuser'] = $name;
        header("location:Welcome.php");
    } else {
        echo "failed to update";
        header("location:Welcome.php");
    }
