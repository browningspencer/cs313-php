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
    <h2>Add a New Recipe</h2>
</div>


<form class="inline-form" action ="../recipes/" method="post" enctype="multipart/form-data" name="SignInNotifaction">

    <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" size="50" placeholder="ex: Babushka's Borsch" required>
    <label for="text">Ingredients and Directions:</label>
    <textarea class = "form-control" name="text" id="textInput"></textarea>
        <div class="input-group-btn">
            <input type="submit"  value="Add Recipe" class="btn btn-default">
            <input type="hidden" name = "action" value="addRecipe">

        </div>
</form>

</body>
</html>