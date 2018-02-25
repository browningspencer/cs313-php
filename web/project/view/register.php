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
<!--<nav>-->
<!--    <h2><a href="../"> Cilantro Recipe Book</a></h2>-->
<!--    <div class="buttons">-->
<!--        <a  href="../accounts/" class="btn btn-warning navbar-btn">Home</a>-->
<!--        --><?php //if(isset($_SESSION['loggedIn'])){
//            echo '<a class="btn btn-danger navbar-btn" href="../accounts?action=Logout">LogOut</a>';}
//        ?>
<!--    </div>-->
<!--</nav>-->
<div class="jumbotron">
    <h1>Cilantro</h1>
    <p>--The Recipe Book--</p>
</div>
<div class="messageText">
   <?php
            if (isset($message)){echo $message;}
            ?>

</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Register for an account!</h2>
    </div>

<form action ="../accounts/" method="post" enctype="multipart/form-data" name="SignInNotifaction">

    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" class="form-control" size="50" placeholder="ex: John" required>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" class="form-control" size="50" placeholder="ex: Jacobjinglehimersmith" required>
    </div>
    <div class="form-group">
       <label for="clientEmail">Email:</label>
        <input type="email" name="clientEmail" class="form-control" size="50" placeholder="email address" value="<?php if (isset($clientEmail)){echo $clientEmail;}?>" required>
    </div>
    <div class="form-group">
        <label for="clientPassword">Password: </label><input name="clientPassword" type="password" class="form-control" size="50" placeholder="password" required>
    </div>
        <input type="submit" name="action" value="register" class="btn btn-success">
</form>
</div>