<?php
session_start();
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/adminLogin.js"></script>
    <script type="text/javascript" src="js/messageFade.js"></script>
    <link rel="stylesheet" type="text/css" href="css/interfaith.css">
    <title>Adopt-A-Meal - Admin Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico"/>
</head>

<body>
    <?php include('nav.php'); ?>

    <!-- Displays any error messages to page -->
    <?php if (isset($_SESSION['messages'])) {
    foreach ($_SESSION['messages'] as $message) {?>
        <div class="message <?php echo isset($_SESSION['validated']) ? $_SESSION['validated'] : '';?>"><?php
        echo $message; ?></div>
    <?php  }
    unset($_SESSION['messages']);
    ?> </div>
    <?php } ?>

    <!--Login form.. posts to loginHandler.php  -->
    <form id="login" method="post" action="loginHandler.php" enctype="multipart/form-data">
    <h2> ADMIN LOGIN </h2>
    <div id="login">
        <label for="username"><b>Username</b></label><br>
        <input type="text" id="ip2" placeholder="Enter Username"  value="<?php echo isset($_SESSION['presets']['username']) ? $_SESSION['presets']['username'] : ''; ?>" name="username" required><br>

        <label for="password"><b>Password</b></label>
        </br>
        <input type="password" id="ip2" placeholder="Enter Password"  value="<?php echo isset($_SESSION['presets']['password']) ? $_SESSION['presets']['password'] : ''; ?>" name="password" required>
        </br>
        <button type="submit">Login</button>
        <button type="reset" class="cancelbtn">Cancel</button>
    </div>
    </form>

    <div id="footer">
        <footer>
            <li id="first">© 2019 Interfaith Sanctuary</li>
            <li>Contact Admin: <a id="adminEmail" href="mailto: ">TODO</a></li>
        </footer>
    </div>
    
</body>
</html>
