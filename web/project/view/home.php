<?php
session_start();

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

</body>
</html>