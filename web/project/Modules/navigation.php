<nav>
    <h2><a href="../"> my || journal</a></h2>
    <div class="buttons">
    <a  href="../accounts/" class="btn btn-warning navbar-btn">myHome</a>
    <?php if(isset($_SESSION['loggedIn'])){
        echo '<a class="btn btn-danger navbar-btn" href="../accounts?action=Logout">LogOut</a>';}
     ?>
    </div>
</nav>