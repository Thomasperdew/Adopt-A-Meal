<!-- <?php
// session_start();
// $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
// $username = $_SESSION['username'];
// $password = $_SESSION['password'];
// unset($_SESSION['message']);
// unset($_SESSION['username']);
// unset($_SESSION['password']);
?> -->

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <link rel="stylesheet" type="text/css" href="css/interfaith.css">
    <title>Adopt-A-Meal - Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico"/>
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" id="nav-shadow">
        <div class="navbar-header pull-left">
            <a class="navbar-brand" id="navbar-brand-padding" href="http://interfaithsanctuary.org/">
                <img class="brand" alt="Brand" id="navbar-brand-size" src="/images/Interfaith-Temp-Logo.png">
            </a>
            <a class="navbar-brand" id="navbar-brand-font" href="/home.php">Adopt a Meal</a>
        </div>
        <!-- <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> -->
        <div class="collapse navbar-collapse pull-right" id="navigation">
            <ul class="nav navbar-nav">
                <li class="nav-item "><a class="navbar-link" href="/home.php">Calendar View</a></li>
                <li class="nav-item "><a class="navbar-link" href="/mealIdeas.php">Meal Ideas</a></li>
                <li class="nav-item "><a class="navbar-link" href="/adminLogin.php">Admin</a></li>
            </ul>
        </div>
    </nav>

    <!-- <img src="images/Interfaith-Temp-Logo-Other.png" width="100" height="70"> -->
    <div class="text-center jumbotron">
        <h1 id="jumbotron-header">Adopt A Meal</h1>
        <p>Select a date to Adopt A Meal</p>
    </div>
    
    <div class="calendar">
    <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=u.boisestate.edu_3b9se4jfs262g52r696dh5vu1k%40group.calendar.google.com&amp;color=%230F4B38&amp;ctz=America%2FDenver" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>    </div>


    <div class="row">
        <div class="col-sm-12 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body calendar-panel text-center">
                </div>
                <div class="panel-footer">

                    '<h4>Instructions:</h4>
                    <ol>
                        <li>Click an open volunteer event in the Calendar above (Open events are blue).</li>
                        <li>Fill out the form that opens with a your organization\'s name or your name, contact information, and some information about the meal that will be provided.
                            If you\'re unsure of the exact meal, please include that in the meal description and we will work with you!</li>
                        <li>Submit the form, and then you will recieve an e-mail confirmation.</li>
                        <li>Staff at Interfaith Sanctuary will contact you once they\'ve been notified of your request.</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="text-center jumbotron jumbotron-footer">
        <h1>Thank you for adopting a meal!</h1>
        <p>We would like to thank all the organizations who have volunteered for their wonderful contributions!</p>
        <div class="row">
                    </div>
    </div>
    <!-- <div class="text-center jumbotron jumbotron-footer">
        <p>We would like to thank all the organizations who have volunteered for their wonderful contributions!</p>
        <div class="row">
            <div class="list-group-item thank-you-list-item col-md-2 md-col-3 lg-col-4" >
                <h3>
                    
                </h3>
            </div>
        </div>
    </div>  -->
    <!-- past event modal -->
    <!-- <div id="past-event-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="title" style="margin-top: 15px;">This event is in the past</h3>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div> -->

    <div id="footer">
        <footer>
            <li id="first">© 2019 Interfaith Sanctuary</li>
            <li>Contact Admin: <a id="adminEmail" href="mailto: ">TODO</a></li>
        </footer>
    </div>
</body>

</html>
