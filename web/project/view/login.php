<!DOCTYPE html>
<html>
<head>
    <title>Journal Me</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//if ($_SESSION['loggedIn']){
//echo "<nav><h2><a href='../'> my || journal</a></h2><div class='buttons'>";
//        echo "<a  href='../accounts/' class='btn btn-warning navbar-btn'>myHome</a>";
//        if(isset($_SESSION['loggedIn'])){
//        echo '<a class="btn btn-danger navbar-btn" href="../accounts?action=Logout">LogOut</a>';}
//
//        echo "</div></nav>";
//}
//?>
<div class="jumbotron">
    <h1>Welcome to Journal||Me</h1>
    <p>Journey before destination</p>
</div>
<div class="messageText">
   <?php
            if (isset($message)){echo $message;}
            ?>

</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Log In</h2>
    </div>

<form action ="../accounts/index.php?action=Login" method="post" enctype="multipart/form-data" name="SignInNotifaction">
    <div class="form-group">
       <label for="clientEmail">Email: </label> <input type="email" name="clientEmail" class="form-control" size="50" placeholder="email address" value="<?php if(isset($clientEmail)){echo $clientEmail;}?>" required>
    </div>
    <div class="form-group">
        <label for="clientPassword">Password: </label><input name="clientPassword" type="password" class="form-control" size="50" placeholder="password" required>
    </div>
        <input type="submit" name="action" value="Login" class="btn btn-success">

</form>
</div>