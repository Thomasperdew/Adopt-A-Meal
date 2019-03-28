<?php
    session_start();
    // $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
    if (!$_SESSION['admin']) {
        header('Location: /index.php');
        exit;
    }
    require_once 'Dao.php';
    $dao = new Dao();
    $lists = $dao->getMealIdeas();
    $vols = $dao->getVolunteers();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/table.js"></script>
    <link rel="stylesheet" type="text/css" href="css/interfaith.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.datatables.min.css">
    <title>Adopt-A-Meal - Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico"/>
</head>

<body>

<?php 
    include('adminNav.php'); 
?>


<h1> Volunteer Requests </h1>
<?php


echo "<table id='example' class= 'display'>
<thead>
    <tr>
        <th align='left'>Organization</th>
        <th align='left'>Email</th>
        <th align='left'>Phone</th>
        <th align='left'>Meal Description</th>
        <th align='left'>Notes</th>
        <th align='left'>Paper Goods</th>
    </tr>
</thead>";

echo "<tbody>";
foreach ($vols as $vol){
echo "<tr>";
echo "<td>" . htmlentities($vol['organization_name']) . "</td>";
echo "<td>" . htmlentities($vol['email']) . "</td>";
echo "<td>" . htmlentities($vol['phone']) . "</td>";
echo "<td>" . htmlentities($vol['meal_description']) . "</td>";
echo "<td>" . htmlentities($vol['notes']) . "</td>";
if($vol['paper_goods'] == 0){
    echo "<td>" . "Not Providing" . "</td>";
    }
    else{
        echo "<td>" . "Will Provide" . "</td>";
    }
echo "</tr>";
}
echo "</tbody>";
echo "</table>";

    ?>
</div>
    
<?php 
    include('footer.php'); 
?>
</div>
</body>


</html>
