<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();
$date = $_POST['date'];
$send_to = $dao->getEmails();
$subject = "Volunteer Date Added";
$message = "The following date: " . $date . " has been added as a volunteer date by " . $_SESSION['username'] . ".";

$presets = array();
$bad = false;

echo $date;

if (empty($date)) {
    $_SESSION['messages'][] = "Something went wrong.";
    $bad = true;
}
if ($bad) {
  header('Location: /adminVolunteer.php');
  $_SESSION['validated'] = 'bad';
  exit;
}


$dao->addVolunteerDate($date);
$_SESSION['validated'] = 'good';
$_SESSION['messageSuccess'][]= "New volunteer date has been added to list successfully!";
mail($send_to,$subject,$message);
header('Location: /adminVolunteer.php');
exit;
