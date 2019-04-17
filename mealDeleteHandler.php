<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();
$send_to = $dao->getEmails();
$subject = "Meal Idea Deleted";
$message = "A meal idea has been deleted by " . $_SESSION['username'] . ".";

$id = $_POST['id'];
$dao->deleteMealIdea($id);
$_SESSION['messageSuccess'][]= "Meal idea has been deleted successfully!";
mail($send_to,$subject,$message);
header('Location: /adminMealIdeas.php');
exit();
