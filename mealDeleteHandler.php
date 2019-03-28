<?php
session_start();

require_once 'Dao.php';
$id = $_POST['id'];
$dao = new Dao();
$dao->deleteMealIdea($id);
header('Location: /adminMealIdeas.php');
exit();