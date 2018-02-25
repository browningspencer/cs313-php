<nav>
    <h2><a href="../"> Cilantro Recipe Book</a></h2>
    <div class="buttons">
    <a  href="../accounts/" class="btn btn-warning navbar-btn">Home</a>
    <?php if(isset($_SESSION['loggedIn'])){
        echo '<a class="btn btn-danger navbar-btn" href="../accounts?action=Logout">LogOut</a>';}
     ?>
    </div>
</nav>