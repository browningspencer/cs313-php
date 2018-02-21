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
<nav>
    <h2><a href="../"> my || journal</a></h2>
    <div class="buttons">
        <a  href="../accounts/" class="btn btn-warning navbar-btn">myHome</a>
        <?php if(isset($_SESSION['loggedIn'])){
            echo '<a class="btn btn-danger navbar-btn" href="../accounts?action=Logout">LogOut</a>';}
        ?>
    </div>
</nav>
<body>
<div class="jumbotron intro">
    <h2>Welcome to your journal page, <?php echo $_SESSION['clientData']['firstname'];  ?></h2>
    <p>Check out your options below!</p>
</div>

<h3 class="message"><?php if (isset($message)){echo $message;}?></h3>



<div class="yourPage">
    <a class="btn btn-success" href="../entries/index.php?action=viewEntries">View previous entries</a>
    <a class="btn btn-primary" href="../entries/index.php?action=goAddEntry">Add a new entry</a>
</div>
<?php
if ($action == 'viewEntries') {
    $entries = getEntries($userId);
    foreach ($entries as $entry) {
        echo '<div class="panel panel-default">';
        echo '<div class="panel-heading">';
        echo '<h3><span> Title: <strong>' . $entry['entrytitle'] . '</strong></span>';
        echo '<span> Date: <strong>' . $entry['date'] . '</strong></span>';
        echo '</h3>';
        echo ' </div>';
        echo ' <div class="panel-body">';
        echo '<p>' . $entry['entrytext'] . '</p>';
        echo ' </div></div>';
    }
}
?>

</body>
</html>