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

<div class="jumbotron intro">
    <h2>Delete your Journal Entry, <?php echo $_SESSION['clientData']['firstname'];  ?>?</h2>
</div>
<div class="warningText">WARNING: deletions are final. Proceed only if you wish to permanently delete your entry.</div>
<div class="entryForm">
    <?php
    if (isset($deleteEntryView)){
        echo $deleteEntryView;
    }
    ?>
</div>
</body>
</html>