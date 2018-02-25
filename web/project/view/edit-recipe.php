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
<div class="jumbotron intro">
    <nav>
        <h2><a href="../"> Cilantro Recipe Book</a></h2>
        <div class="buttons">
            <a  href="../accounts/" class="btn btn-primary navbar-btn">Home</a>
            <?php if(isset($_SESSION['loggedIn'])){
                echo '<a class="btn btn-danger navbar-btn" href="../accounts?action=Logout">LogOut</a>';}
            ?>
        </div>
    </nav>

    <h2>Edit your recipe <?php echo $_SESSION['clientData']['firstname'];  ?></h2>

</div>
<div class="recipeForm">
<?php
if (isset($editRecipeView)){
    echo $editRecipeView;
}
?>
</div>
</body>
</html>