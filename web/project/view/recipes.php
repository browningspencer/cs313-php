<!DOCTYPE html>
<html>
<head>
    <title>Cilantro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" type="image/x-icon" href="../logo/cilantro_favicon.ico"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav>
    <h2><a href="../"> Cilantro Recipe Book</a></h2>
    <div class="buttons">
        <a  href="../accounts/" class="btn btn-warning navbar-btn">Home</a>
        <?php if(isset($_SESSION['loggedIn'])){
            echo '<a class="btn btn-danger navbar-btn" href="../accounts?action=Logout">LogOut</a>';}
        ?>
    </div>
</nav>
<div class="jumbotron intro">
    <h2><?php echo $_SESSION['clientData']['firstname'];  ?>'s Recipe Book</h2>
</div>


<?php
    $recipes = getrecipes($userId);
    foreach ($recipes as $recipe) {
        echo '<div class="panel panel-default">';

        $color=$recipe['recipecategory'];
        if($color == "Breakfast"){
            echo '<div class="panel-heading breakfast">';
        } else if ($color == "Lunch"){
            echo '<div class="panel-heading lunch">';
        } else if ($color == "Dinner"){
            echo '<div class="panel-heading dinner">';
        } else if ($color == "Dessert"){
            echo '<div class="panel-heading dessert">';
        } else {
            echo '<div class="panel-heading">';
        }

        echo '<h3><span> Title: <strong>' . $recipe['recipetitle'] . '</strong></span>';
        echo '<h4> Date Added: <strong>' . $recipe['date'] . '</strong></h4>';
        echo '</h3>';
        echo ' </div>';
        echo ' <div class="panel-body">';
        echo '<p>Category: ' . $recipe['recipecategory'] . '</p>';
        echo "<a class='btn btn-primary' href = '../recipes/?action=editRecipe&id=$recipe[recipeid]'>edit</a> | ";
        echo "<a class='btn btn-danger' href = '../recipes/?action=goDelete&id=$recipe[recipeid]'>delete</a>";
        echo ' </div></div>';
    }
?>

</body>
</html>