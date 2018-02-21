<?php
session_start();
//if ($_SESSION['loggedIn']){
//    echo "<nav><h2><a href='../'> my || journal</a></h2><div class='buttons'>";
//           if(isset($_SESSION['loggedIn'])){
//            echo '<a class="btn btn-danger navbar-btn" href="../accounts?action=Logout">LogOut</a>';}
//
//   echo "</div></nav>";
//}
include 'Modules/head.php';
?>


<form action="./accounts/" class="inline-form" method="post" enctype="multipart/form-data" name="getStarted">
    <div class="input-group">
        <input name="email" type="email" class="form-control" size="50" placeholder="email address" id="homeInput" required>
        <div class="input-group-btn">
            <button class="btn btn-success" type="submit" name="action" value="goRegister">Get Started</button>
            <button class="btn btn-primary" type="submit" name="action" value="login">Log in </button>
        </div>
    </div>
</form>
<div class="container-fluid about">
    <h2>About journal||me</h2>
    <p>JournalMe lets you keep track of your life. You can access your journal from anywhere! As long as your are connected to the internet,
        you can create a journal entry or view previous entries. We enable you to seamlessly record  and remember the moments that matter
        most to you. </p>

</div>


</body>
</html>