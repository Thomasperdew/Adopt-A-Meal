<?php
session_start();
$date = $_POST['date'];

require_once 'Dao.php';
$dao = new Dao();
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
header('Location: /adminVolunteer.php');
exit;