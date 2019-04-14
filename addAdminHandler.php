<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['presets']['username'] = $username;
$_SESSION['presets']['password'] = $password;
$to_email_address = "jdguevara93@gmail.com" ; // We need to fill this with DB emails
$subject = "Admin Added";
$message = $username . " has been added as an admin by " . $_SESSION['username'] . ".";

require_once 'Dao.php';
$dao = new Dao();
$presets = array();
$bad = false;

if (empty($username)) {
    $_SESSION['messages'][] = "Username is required.";
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

$dao->addAdmin($username, $password, 0);
$_SESSION['validated'] = 'good';
$_SESSION['messageSuccess'][]= "New admin has been added successfully!";
mail($to_email_address,$subject,$message);
unset($_SESSION['presets']);
header('Location: /adminManage.php');
exit;
