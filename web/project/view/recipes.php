<!DOCTYPE html>
<html>
<head>
    <title>Cilantro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
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
        echo '<div class="panel-heading">';
        echo '<h3><span> Title: <strong>' . $recipe['recipetitle'] . '</strong></span>';
        echo '<span> Date: <strong>' . $recipe['date'] . '</strong></span>';
        echo '</h3>';
        echo ' </div>';
        echo ' <div class="panel-body">';
        echo '<p>' . $recipe['recipetext'] . '</p>';
        echo "<a class='btn btn-primary' href = '../recipes/?action=editRecipe&id=$recipe[recipeid]'>edit</a> | ";
        echo "<a class='btn btn-danger' href = '../recipes/?action=goDelete&id=$recipe[recipeid]'>delete</a>";
        echo ' </div></div>';
    }
?>

</body>
</html>