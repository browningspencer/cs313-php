<?php
session_start();
require "../dbConnect.php";
$db = get_db();


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'login':
        $clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        include '../view/login.php';
        break;
    case 'Login':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

           function getClient($clientEmail){
            $db = get_db();
            $sql = 'SELECT userid, firstname, lastname, email, password FROM users WHERE email = :email';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
            $stmt->execute();
            $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $clientData;
        }

        $clientData = getClient($clientEmail);
        $_SESSION['clientData'] = $clientData;
        $hashCheck = password_verify($clientPassword, $_SESSION['clientData']['password']);

        if ($hashCheck) {
        $_SESSION['loggedIn'] = TRUE;
        include '../view/your-page.php';
        }else{
            $message = '<div class="panel panel-default">';
            $message .= '<div class="panel-heading">';
            $message .= "incorrect email and/or password, please check your spelling and try again.";
            $message .= "</div></div>";
            include '../view/login.php';
        }
        break;
    case 'Logout' :
        session_destroy();
        header('location: ../');
        break;
    case 'goRegister' :
        $clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        include '../view/register.php';
        break;
    case'register':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $clientFirstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);

        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

//        THIS FUNCTION WILL CHECK IF THE EMAIL ALREADY EXISTS:
        function checkExistingEmail($clientEmail) {
            $db = get_db();
            $sql = 'SELECT email FROM users WHERE email = :email';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
            $stmt->execute();
            $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
            $stmt->closeCursor();
            if(empty($matchEmail)){
                return 0;
            }
            else {
                return 1;
            }
        }
//        CALL THE FUNCTION TO CHECK IF THE EMAIL EXISTS
        $existingEmail = checkExistingEmail($clientEmail);

//          IF EMAIL ALREDY EXISTS,  DISPLAY ERROR MESSAGE & GIVE THE OPTION FOR THE USER TO LOG IN INSTEAD
        if($existingEmail){
            $message = '<div class="panel panel-default">';
            $message .= '<div class="panel-heading">';
            $message .= "That email already exists, would you like to login instead?";
            $message .= "<a class='btn btn-default' href='./accounts/action?=login'>Log in</a>";
            $message .= "<br>You may also try again below:</div></div>";
            include '../view/register.php';
        }

//        CONTINUE TO REGISTER THE USER:

    //THIS FUNCTION WILL REGISTER THE USER-
        function registerUser($firstname, $lastname, $email, $password){
            $db = get_db();
            $sql = 'INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            $stmt->closeCursor();
            return $rowCount;
        }

        $regOutcome = registerUser($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

// Check and report the result
        if($regOutcome === 1){

            $message = "<h3>Thanks for registering, $clientFirstname! Please use your email and password to login.</h3>";
            include '../view/login.php';
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/register.php';
            exit;
        }

        break;


    default:
        if ($_SESSION['loggedIn']) {
            include '../view/your-page.php';
        }else{
            include '../view/home.php';
        }
        
}