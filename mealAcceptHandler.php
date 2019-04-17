<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();
$send_to = $dao->getEmails();
$subject = "Meal Idea Accepted";
$message = "A meal idea has been accepted by " . $_SESSION['username'] . ".";

$id = $_POST['btn'];
$dao->acceptMealIdea($id);
<<<<<<< HEAD
$_SESSION['messagePending'][]= "Meal idea has been accepted";
mail($send_to,$subject,$message);
=======
$_SESSION['messageSuccess'][]= "Meal idea has been accepted";
mail($to_email_address,$subject,$message);
>>>>>>> 81f582734a569ff43a7d87dc576a5814693b75d6
header('Location: /adminMealIdeas.php');
exit();
