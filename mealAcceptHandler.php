<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();
$send_to = $dao->getEmails();
$subject = "Meal Idea Accepted";
$message = "A meal idea has been accepted by " . $_SESSION['username'] . ".";

// Got here, means everything validated and meal idea will be accepted
$id = $_POST['btn'];
$dao->acceptMealIdea($id);
$_SESSION['messageSuccess'][]= "Meal idea has been accepted";
mail($to_email_address,$subject,$message);
header('Location: /adminMealIdeas.php');
exit();
