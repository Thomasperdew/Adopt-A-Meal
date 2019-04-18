<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();
$date = $_POST['removeDate'];

$presets = array();
$bad = false;

if (empty($date)) {
    $_SESSION['messages'][] = "Something went wrong.";
    $bad = true;
}

if ($bad) {
  header('Location: /adminVolunteer.php');
  $_SESSION['validated'] = 'bad';
  exit;
}

// Got here, means everything validated and volunteer date will be deleted from database/main page
$dao->removeVolunteerDate($date);
$_SESSION['validated'] = 'good';
$_SESSION['messageSuccess'][]= "Volunteer date has been removed from list successfully!";
$send_to =  $dao->getEmails();
$subject = "Date Removed";
$message = "The following date: " . $date . " has been removed by " . $_SESSION['username'] . ".";
mail($send_to, $subject, $message);
unset($_SESSION['presets']);
header('Location: /adminVolunteer.php');
exit;
