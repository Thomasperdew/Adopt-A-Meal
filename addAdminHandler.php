<?php
/*
Adds a admin
*/

require_once 'Dao.php';
$dao = new Dao();
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION['presets']['username'] = $username;
$_SESSION['presets']['email'] = $email;
$_SESSION['presets']['password'] = $password;
$send_to =  $dao->getEmails();
$subject = "Admin Added";
$message = $username . " has been added as an admin by " . $_SESSION['username'] . ".";

$presets = array();
$bad = false;

if (empty($username)) {
    $_SESSION['messages'][] = "Username is required.";
    $bad = true;
}

if (empty($email)) {
    $_SESSION['messages'][] = "Email is required.";
    $bad = true;
}

//Method to check if email is valid
if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)){ 
    $_SESSION['messages'][] = "Invalid email";
    $bad = true;
}

if (empty($password)) {
    $_SESSION['messages'][] = "Password is required.";
    $bad = true;
}

if($dao->checkUsername($username)){
    $_SESSION['messages'][] = "Admin already Exists";
    $bad = true;
}


if ($bad) {
  header('Location: /adminManage.php');
  $_SESSION['validated'] = 'bad';
  exit;
}

// Got here, means everything validated and will add admin
$dao->addAdmin($username, $email, $password, 0);
$_SESSION['validated'] = 'good';
$_SESSION['messageSuccess'][]= "New admin has been added successfully!";
mail($send_to,$subject,$message);   //Send notification email
unset($_SESSION['presets']);
header('Location: /adminManage.php');
exit;
