<?php
ini_set('max_execution_time', 180);

$servername = "localhost";
$username = "root";
$password = "";
$database = "course";

$connect = mysqli_connect($servername, $username, $password, $database);

if(!$connect)
{
    die("sorry can't connect to server :" . mysqli_connect_error());
}


for($i = 1 ; $i < 6 ; $i++)
{
    $idd = $i ;
    $fname = "lmn".$i;
    $lname = "st".$i;
    // $z = rand(1,3);
    // // echo $z;
    // while($z>=0)
    // {
    //     $z = $z - 1;
    //     $r = rand(1,5);
    //     $sql = "INSERT INTO `s_course` (`s_id`, `c_id`) VALUES ('$idd', '$r')";
    //     // echo $sql;
    //     mysqli_query($connect, $sql);
    // }
    $sql = "INSERT INTO course_details (`c_id`, `t_fname`, `t_lname`) VALUES ('$idd', '$fname', '$lname')";
    mysqli_query($connect, $sql);
    // $sql = "INSERT INTO s_course (`s_id`, `c_id') VALUES ('$idd', '')";
    // if(mysqli_query($connect, $sql))
    // {
    //     echo "added";
    //     echo "<br>";
    // }
}

?>