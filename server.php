<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$voornaam    = "";
$achternaam    = "";
$postcode ="";
$huisnummer ="";
$straatnaam ="";
$plaats ="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'wideworldimporters');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $voornaam = mysqli_real_escape_string($db, $_POST['voornaam']);
    $achternaam = mysqli_real_escape_string($db, $_POST['achternaam']);
    $postcode = mysqli_real_escape_string($db, $_POST['postcode']);
    $huisnummer = mysqli_real_escape_string($db, $_POST['huisnummer']);
    $straatnaam = mysqli_real_escape_string($db, $_POST['straatnaam']);
    $plaats = mysqli_real_escape_string($db, $_POST['plaats']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password, voornaam, achternaam, postcode, huisnummer, straatnaam, plaats) 
  			  VALUES('$username', '$email', '$password', '$voornaam', '$achternaam', '$postcode', '$huisnummer', '$straatnaam', '$plaats')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['postcode'] = $postcode;
        $_SESSION['huisnummer'] = $huisnummer;


        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $results = mysqli_fetch_array($results, MYSQLI_ASSOC);
        if ($results != null) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $results['id'];
            $_SESSION['email'] = $results['email'];
            $_SESSION['voornaam'] = $results['voornaam'];
            $_SESSION['achternaam'] = $results['achternaam'];
            $_SESSION['postcode'] = $results['postcode'];
            $_SESSION['huisnummer'] = $results['huisnummer'];
            $_SESSION['straatnaam'] = $results['straatnaam'];
            $_SESSION['plaats'] = $results['plaats'];
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>