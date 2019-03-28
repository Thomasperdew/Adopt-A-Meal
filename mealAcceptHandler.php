<?php
session_start();

require_once 'Dao.php';
$id = $_POST['btn'];
$dao = new Dao();
$dao->acceptMealIdea($id);
header('Location: /adminMealIdeas.php');
exit();