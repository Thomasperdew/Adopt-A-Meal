<?php
    session_start();
    //If user not admin dont display this page and return them to main page
    if (!$_SESSION['admin']) {
        header('Location: /index.php');
        exit;
    }
    require_once 'Dao.php';
    $dao = new Dao();
    $lists = $dao->getMealIdeas();  //Grabs all meal ideas for first list (pending)
    $lists2 = $dao->getMealIdeas(); //Grabs all meal ideas again for second list (accepted/rejected)
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/table.js"></script>
    <script type="text/javascript" src="js/modals.js"></script>
    <script type="text/javascript" src="js/messageFade.js"></script>
    <link rel="stylesheet" type="text/css" href="css/interfaith.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.datatables.min.css">
    <title>Adopt-A-Meal - Admin Meal Ideas</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico"/>
</head>

<body>

<?php 
    include('adminNav.php'); 
?>

<!--Displays all success/error messages to page -->
<?php if (isset($_SESSION['messageSuccess'])) {
            foreach ($_SESSION['messageSuccess'] as $message) {?>
                <div class="messageSuccess <?php echo isset($_SESSION['validated']) ? $_SESSION['validated'] : '';?>"><?php
                    echo $message; ?></div><br>
            <?php  }
            unset($_SESSION['messageSuccess']);
            ?> </div>
<?php } ?>

<!--Sets up and displays table of all pending meal ideas to admin meal ideas page -->
<h1>Pending Meal Ideas </h1>
<?php
echo "<table id='' class= 'display'>
<thead>
    <tr>
        <th align='left'>Title</th>
        <th align='left'>Description</th>
        <th align='left'>Ingredients</th>
        <th align='left'>Instructions</th>
        <th align='left'>External Link</th>
        <th align='left'>Name</th>
        <th align='left'>Email</th>
        <th align='left'>Status</th>
        <th align='left'>Manage</th>
    </tr>
</thead>";
echo "<tbody>";
// Loops through all suggested meal ideas
foreach ($lists as $list){
    //If meal ideas is pending (meal_idea_status = 0)
    if($list['meal_idea_status'] == 0){
        echo "<tr>";
        echo "<td>" . htmlentities($list['title']) . "</td>";
        echo "<td>" . htmlentities($list['description']) . "</td>";
        echo "<td>" . htmlentities($list['ingredients']) . "</td>";
        echo "<td>" . htmlentities($list['instructions']) . "</td>";
        if($list['external_link'] == NULL){
            echo "<td></td>";
        }
        else{
            echo "<td>" . htmlentities($list['external_link']) . "</td>";
        }
        if($list['name'] == NULL){
            echo "<td></td>";
        }
        else{
            echo "<td>" . htmlentities($list['name']) . "</td>";
        }
        if($list['email'] == NULL){
            echo "<td></td>";
        }
        else{
            echo "<td>" . htmlentities($list['email']) . "</td>";
        }
        echo "<td>" . "Pending" . "</td>";
        // Accept meal idea button. Posts to mealAcceptHandler.php -- Reject meal idea button. Posts to mealRejectHandler.php
        echo "<td> <form method='post' action='mealAcceptHandler.php' enctype='multipart/form-data' id = 'idea'>
        <button name='btn' value='".$list['id']."' type='submit'>Accept</button> </form>
        <form method='post' action='mealRejectHandler.php' enctype='multipart/form-data' id = 'idea'>
        <button name='btn' value='" . $list['id']. "' type='submit'>Reject</button> </form> </td>";
        echo "</tr>";
        
    }
}
        echo "</tbody>";
        echo "</table>";
    ?>
        
    <!-- Sets up and displays Accepted and Rejected meals ideas table -->
    <h1>Accepted/Rejected Meal Ideas</h1>
    <?php
    echo "<table id='' class= 'display'>
    <thead>
        <tr>
            <th align='left'>Title</th>
            <th align='left'>Description</th>
            <th align='left'>Ingredients</th>
            <th align='left'>Instructions</th>
            <th align='left'>External Link</th>
            <th align='left'>Name</th>
            <th align='left'>Email</th>
            <th align='left'>Status</th>
            <th align='left'>Manage</th>
        </tr>
    </thead>";
    echo "<tbody>";
    // Loop through each meal idea
    foreach ($lists2 as $list){
    //Only grab meals ideas that are not pending
    if($list['meal_idea_status'] != 0){
        echo "<tr>";
        echo "<td>" . htmlentities($list['title']) . "</td>";
        echo "<td>" . htmlentities($list['description']) . "</td>";
        echo "<td>" . htmlentities($list['ingredients']) . "</td>";
        echo "<td>" . htmlentities($list['instructions']) . "</td>";
        if($list['external_link'] == NULL){
            echo "<td></td>";
        }
        else{
            echo "<td>" . htmlentities($list['external_link']) . "</td>";
        }
        if($list['name'] == NULL){
            echo "<td></td>";
        }
        else{
            echo "<td>" . htmlentities($list['name']) . "</td>";
        }
        if($list['email'] == NULL){
            echo "<td></td>";
        }
        else{
            echo "<td>" . htmlentities($list['email']) . "</td>";
        }
        //If status is accepted (1) display accepted. Only accepted meal ideas will display on meal ideas main page
        if($list['meal_idea_status'] == 1){
        echo "<td>" . "Accepted" . "</td>";
        }
        //If status is rejected (1) display rejected
        else if($list['meal_idea_status'] == 2){
            echo "<td>" . "Rejected" . "</td>";
        }
        //Buttons to activate confimation modals for restoring or deleting meal ideas
        echo "<td>
            <button class='restore' data-id='".$list['id']."'>Restore</button>
            <button class='delete' data-id='".$list['id']."'>Delete</button></td>";
        echo "</tr>";
        
    }
}
echo "</tbody>";
echo "</table>";
?>

    <!-- Pop up modal comfirming you want to delete meal idea. If submitted will delete idea entirely from database -->
    <div class="modalContainer" id="deleteMealModal">
        <form method="POST" action="mealDeleteHandler.php" class="formModal" enctype="multipart/form-data">
        <h1>ARE YOU SURE YOU WANT TO DELETE THIS MEAL IDEA?</h1>
        <p class="text-warning"><small>This will delete entire record and this action cannot be undone.</small></p>
            <!-- Hidden field to grab id of meal idea from button for deleting purposes -->
            <input type="hidden" name="id" value=""/>
            <button class="btn btn-danger" type="submit">Delete</button>
            <button type="reset" class="btn cancel" onclick="closeDeleteModal()">Close</button>
        </form>
    </div>
    
    <!-- Pop up modal comfirming you want to restore meal idea. If submitted will update meal idea status to pending. Will remove accepted idea from main page as well -->
    <div class="modalContainer" id="restoreMealModal">
        <form method="POST" action="mealRestoreHandler.php" class="formModal">
        <h1>ARE YOU SURE YOU WANT TO RESTORE THIS MEAL IDEA?</h1>
        <p class="text-warning"><small>This will change status back to pending.</small></p>
            <!-- Hidden field to grab id of meal idea from button for status changing purposes -->
            <input type="hidden" name="id" value=""/>
            <button class="btn btn-danger" type="submit">Okay</button>
            <button type="reset" class="btn cancel" onclick="closeRestoreModal()">Close</button>
        </form>
    </div>
</div>
 
<?php 
    include('footer.php'); 
?>
</div>
</body>


</html>
