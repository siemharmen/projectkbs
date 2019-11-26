<?php
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
    if(empty($_POST['User']) || empty($_POST['Pass'])){
        $error = "Username or Password is Invalid";
    }
    else
    {
        $user=$_POST['User'];
        $pass=$_POST['Pass'];
        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn, "widewordimporters");
        $query = mysqli_query($conn, "SELECT * FROM loginform WHERE Pass='$pass' AND User='$user'");

        $rows = mysqli_num_rows($query);
        if($rows == 1){
            header("Location: index.php");
        }
        else
        {
            $error = "Username of Password is Invalid";
        }
        mysqli_close($conn);
    }
}

?>
