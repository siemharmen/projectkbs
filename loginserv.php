<?php
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
    if(empty($_POST['user']) || empty($_POST['pass'])){
        $error = "Username or Password is Invalid";
    }
    else
    {
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn, "widewordimporters");
        $query = mysqli_query($conn, "SELECT * FROM loginform WHERE Pass='$pass' AND User='$user'");

        $rows = mysqli_num_rows($query);
        if($rows == 1){
            header("Location: index.php"); // Redirecting to other page
        }
        else
        {
            $error = "Username of Password is Invalid";
        }
        mysqli_close($conn); // Closing connection
    }
}

?>
