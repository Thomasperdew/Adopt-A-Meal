<?php
include_once 'Dao.php';

session_start();

$dao = new Dao();
$login = $_POST['username'];
$password = $_POST['password'];

    if (empty($login) || empty($password)) {
        if (empty($login) && empty($password)) {
            $_SESSION['message'] = "Credentials Required!";
            header('Location: adminLogin.php');
            exit;
        }
        if (empty($login)) {
            $_SESSION['message'] = "Username/Email Required!";
            $_SESSION['password'] = $password;
            header('Location: adminLogin.php');
            exit;
        } else if (empty($password)) {
            $_SESSION['message'] = "Password Required!";
            $_SESSION['username'] = $login;
            header('Location: adminLogin.php');
            exit;
        }
        header('Location: adminLogin.php');
        exit;
  }

  // TODO: where do we want to send people after they log in?
  // Check if the user exists
  if($dao->userExists($login, $password) == 1) {
      $_SESSION['logged_in'] = true;
      $_SESSION['user'] = $login;
      header('Location: projects.php');
      exit;
  } else {
      $_SESSION['logged_in'] = false;
      $_SESSION['username'] = $login;
      $_SESSION['password'] = $password;
      $_SESSION['message'] = "Username/Email or Password invalid";
      header('Location: adminLogin.php');
      exit;
  }
