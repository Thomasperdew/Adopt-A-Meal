<?php
session_start();

require_once 'Dao.php';
$id = $_POST['id'];
$dao = new Dao();
$dao->deleteMealIdea($id);
$_SESSION['messageSuccess'][]= "Meal idea has been deleted successfully!";
header('Location: /adminMealIdeas.php');
exit();