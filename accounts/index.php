<?php
/**
 * ACCOUNTS CONTROLLER
 */

// Create or access a Session 
session_start();

// Get the database connection file
require_once '../library/connection.php';
require_once '../library/functions.php';
require_once '../model/accounts-model.php';
require_once '../model/save-model.php';
require_once '../model/spend-model.php';
require_once '../model/debt-model.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

$type_save = "save";
$type_spend = "spend";
$type_debt = "debt";

switch ($action){
    case 'login':

        include '../view/login.php';
        exit;
        break;

    case 'register':

        include '../view/registration.php';
        exit;
        break;

    case 'admin':

        // Get and set the tracker variables as a table
        $saveList = getSaveTrackers($_SESSION['userData']['userId'], $type_save);
        $spendList = getSpendTrackers($_SESSION['userData']['userId'], $type_spend);
        $debtList = getDebtTrackers($_SESSION['userData']['userId'], $type_debt);
        if (sizeof($saveList) > 0 || sizeof($spendList) > 0 || sizeof($debtList) > 0) {
            if (sizeof($saveList) > 0) {
                $saveTable = buildSaveAdminTable($saveList);
            }
            if (sizeof($spendList) > 0) {
                $spendTable = buildSpendAdminTable($spendList);
            }
            if (sizeof($debtList) > 0) {
                $debtTable = buildDebtAdminTable($debtList);
            }
            include '../view/admin.php';
            exit;
        }

        
        /**
         * ADD SPEND AND DEBT TABLE TRACKERS HERE
         */
        
        include '../view/admin.php';
        exit;
        break;

    case 'Login':

        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
        $userEmail = checkEmail($userEmail);
        $checkPassword = checkPassword($userPassword);

        // Check for missing data
        if (empty($userEmail) || empty($checkPassword)) {
            $message = '<p>Please provide a valid email address and password.</p>';
            include '../view/login.php';
            exit;
        }
               
        // If a valid password exists, proceed with the login process
        // Query the user data based on the email address
        $userData = getUser($userEmail);
        // Compare the password just submitted against the hashed password for the matching user
        $hashCheck = password_verify($userPassword, $userData['userPassword']);
        // If the hashes don't match create an error and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit; 
        }
       
        // If a valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        array_pop($userData);
        // Store the array into the session
        $_SESSION['userData'] = $userData;
        
        // Send them to the admin view
        // Get and set the tracker variables as a table
        $saveList = getSaveTrackers($_SESSION['userData']['userId'], $type_save);
        $spendList = getSpendTrackers($_SESSION['userData']['userId'], $type_spend);
        $debtList = getDebtTrackers($_SESSION['userData']['userId'], $type_debt);
        if (sizeof($saveList) > 0 || sizeof($spendList) > 0 || sizeof($debtList) > 0) {
            if (sizeof($saveList) > 0) {
                $saveTable = buildSaveAdminTable($saveList);
            }
            if (sizeof($spendList) > 0) {
                $spendTable = buildSpendAdminTable($spendList);
            }
            if (sizeof($debtList) > 0) {
                $debtTable = buildDebtAdminTable($debtList);
            }
            include '../view/admin.php';
            exit;
        }

        /**
         * ADD DEBT TABLE TRACKER HERE
         */
            
        include '../view/admin.php';
        exit;
        break;

    case 'Register':

        $userFirstName = filter_input(INPUT_POST, 'userFirstName', FILTER_SANITIZE_STRING);
        $userLastName = filter_input(INPUT_POST, 'userLastName', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
        $userEmail = checkEmail($userEmail);
        $checkPassword = checkPassword($userPassword);

        // Check for an existing email (true/false)
        $existingEmail = checkExistingEmail($userEmail);

        // Check for existing email address in the table
        if($existingEmail){
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }

        // Check for missing data
        if (empty($userFirstName) || empty($userLastName) || empty($userEmail) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty fields.</p>';
            include '../view/registration.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regUser($userFirstName, $userLastName, $userEmail, $hashedPassword);

        // Check and report the result
        if ($regOutcome == 1) {
            // setcookie('firstName', $userFirstName, strtotime('+1 year'), '/');
            $message = "<p>Thanks for registering, $userFirstName. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
        } else {
            $message = '<p>Sorry '.$userFirstName.', the registration failed.  Please try again.</p>';
            include '../view/registration.php';
            exit;
        }
        break;

    case 'Logout':
    
        $_SESSION = array();
        session_destroy();
        include '../view/home.php';
        exit;
        break;

    case 'updateAccount':
        include '../view/user_update.php';
        exit;
        break;

    case 'Update_Info':

        $userFirstname = filter_input(INPUT_POST, 'userFirstname', FILTER_SANITIZE_STRING);
        $userLastname = filter_input(INPUT_POST, 'userLastname', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $userEmail = checkEmail($userEmail);
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);

        // Check for an existing email (true/false)
        $existingEmail = checkExistingEmail($userEmail);

        // Check for existing email address in the table
        if ($userEmail != $_SESSION['userData']['userEmail']) {
            if($existingEmail){
                $message = '<p class="notice">Sorry, that email address already exists. Please try again.</p>';
                include '../view/user_update.php';
                exit;
            }
        }

        // Check for missing data
        if (empty($userFirstname) || empty($userLastname) || empty($userEmail)) {
            $message = '<p>Please provide information for all empty fields.</p>';
            include '../view/user_update.php';
            exit;
        }


        // Send the data to the model
        $updateOutcome = updateuser($userFirstname, $userLastname, $userEmail, $userId);

        // Query the user data based on their ID number
        $userData = getuserById($userId);

        // Remove the password from the array
        array_pop($userData);
        // Store the array into the session
        $_SESSION['userData'] = $userData;

        // Check and report the result
        if ($updateOutcome == 1) {
            $message = "<p>Your information has been updated, $userFirstname.</p>";
            $_SESSION['message'] = $message;
            header('Location: /budget/accounts/?action=admin');
            exit;
        } else {
            $message = '<p>Sorry '.$userFirstname.', the update failed.  Please try again.</p>';
            $_SESSION['message'] = $message;
            include '../view/user_update.php';
            exit;
        }
        break;

    case 'Update_Pass':

        $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
        $checkPassword = checkPassword($userPassword);
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);

        // Check for missing data
        if (empty($checkPassword)) {
            $message = '<p>Please enter your new password.</p>';
            include '../view/user_update.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $updateOutcome = updatePassword($hashedPassword, $userId);
        
        // Query the user data based on their ID number
        $userData = getuserById($userId);
        // Compare the password just submitted against
        // the hashed password for the matching user
        $hashCheck = password_verify($userPassword, $userData['userPassword']);
        // If the hashes don't match create an error
        // and return to the user_update view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/user_update.php';
            exit; 
        }

        // Remove the password from the array
        array_pop($userData);
        // Store the array into the session
        $_SESSION['userData'] = $userData;

        // Check and report the result
        if ($updateOutcome == 1) {
            $message = "<p>Your password was successfully changed.</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
        } else {
            $message = '<p>Sorry, the password update failed.  Please try again.</p>';
            $_SESSION['message'] = $message;
            include '../view/user_update.php';
            exit;
        }
        break;

// Delete actions below

    case 'DeleteSave':

        $trackerId = filter_input(INPUT_GET, 'trackerId', FILTER_SANITIZE_NUMBER_INT);
        $trackerName = filter_input(INPUT_GET, 'trackerName', FILTER_SANITIZE_STRING);

        //  Send the data to the model/database
        $deleteResult = deleteSave($trackerId);

        // Check for success
        if ($deleteResult == 1) {
            $message = "<p>Congratulations, $trackerName was successfully deleted.</p>";
            header('location: /budget/accounts/?action=admin');;
            exit;
        } else {
            $message = "<p>Error: $trackerName wasn't deleted.</p>";
            header('location: /budget/accounts/?action=admin');
            exit;
        }
        break;

    case 'DeleteSpend':

        $trackerId = filter_input(INPUT_GET, 'trackerId', FILTER_SANITIZE_NUMBER_INT);
        $trackerName = filter_input(INPUT_GET, 'trackerName', FILTER_SANITIZE_STRING);

        //  Send the data to the model/database
        $deleteResult = deleteSpend($trackerId);

        // Check for success
        if ($deleteResult == 1) {
            $message = "<p>Congratulations, $trackerName was successfully deleted.</p>";
            header('location: /budget/accounts/?action=admin');
            exit;
        } else {
            $message = "<p>Error: $trackerName wasn't deleted.</p>";
            header('location: /budget/accounts/?action=admin');
            exit;
        }
        break;


    case 'DeleteDebt':

        $trackerId = filter_input(INPUT_GET, 'trackerId', FILTER_SANITIZE_NUMBER_INT);
        $trackerName = filter_input(INPUT_GET, 'trackerName', FILTER_SANITIZE_STRING);

        //  Send the data to the model/database
        $deleteResult = deleteDebt($trackerId);

        // Check for success
        if ($deleteResult == 1) {
            $message = "<p>Congratulations, $trackerName was successfully deleted.</p>";
            header('location: /budget/accounts/?action=admin');
            exit;
        } else {
            $message = "<p>Error: $trackerName wasn't deleted.</p>";
            header('location: /budget/accounts/?action=admin');
            exit;
        }
        break;

    default:
        include '../view/admin.php';
}


?>