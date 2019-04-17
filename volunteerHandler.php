<?php
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$description = $_POST['description'];
$notes = $_POST['notes'];
if(empty($_POST['paper'])){
     $paper = 0;
} else {
     $paper = true;
}


require_once 'Dao.php';
$dao = new Dao();
$bad = false;
$date = $dao->getDateByID($id);

if (empty($name)) {
    $_SESSION['messages'][] = "Name/Orginization is required.";
    $bad = true;
}

if (empty($email)) {
    $_SESSION['messages'][] = "Email is required.";
    $bad = true;
}

if (empty($phone)) {
    $_SESSION['messages'][] = "Phone number is required.";
    $bad = true;
}

if (empty($description)) {
    $_SESSION['messages'][] = "Meal description is required.";
    $bad = true;
}

if (empty($notes)) {
    $_SESSION['messages'][] = "Notes on meal are required.";
    $bad = true;
}


if ($bad) {
    header('Location: /mealIdeas.php');
    exit;
}

$dao-> addVolunteer($name, $email, $phone, $description, $notes, $paper, $date);
$_SESSION['messageSuccess'][]= "Your volunteer request has been sent! We will review your event and contact you if it is accepted.";
$send_to = $dao->getEmails();
$subject = "New Volunteer Request";
$message = "The following user has made a volunteer request: " . $name . 
            "\nThey would like to provide the following meal: " . $description .
            "\nThey have selected to volunteer on: " . $date;
mail($send_to, $subject, $message);
header('Location: /home.php');
exit();
