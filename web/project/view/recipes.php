<!DOCTYPE html>
<html>
<head>
    <title>Cilantro</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" type="image/x-icon" href="../logo/cilantro_favicon.ico"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="phone">
    <div class="screen">
      <div class="statusbar">12:40 PM</div>
      <div class="app">
        <main>
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
        $color=$recipe['recipecategory'];
        if($color == "Breakfast"){
            echo '<div class="panel panel-warning">';
        } else if ($color == "Lunch"){
            echo '<div class="panel panel-success">';
        } else if ($color == "Dinner"){
            echo '<div class="panel panel-danger">';
        } else if ($color == "Dessert"){
            echo '<div class="panel panel-info">';
        } else {
            echo '<div class="panel panel-default">';
        }
        echo '<div class="panel-heading">';
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
</main>
</div>
</div>
</div>
</body>
</html>