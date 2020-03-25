<?php
/**
 * DATABASE FUNCTIONS FOR ACCOUNTS
 */


// Check for existing email
function checkExistingEmail($userEmail) {

    $db = dbConnect();
    $sql = 'SELECT userEmail FROM user_data WHERE userEmail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $userEmail, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
        return 0;
       } else {
        return 1;
       }
}

 // Insert site visitor data to the database
 function regUser($userFirstName, $userLastName, $userEmail, $userPassword) {

    // Set the connection up
    $db = dbConnect();
    // Build the insert statement into a variable
    $sql = 'INSERT INTO user_data (userFirstName, userLastName, userEmail, userPassword) 
            VALUES (:firstName, :lastName, :email, :password)';
    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':firstName', $userFirstName, PDO::PARAM_STR);
    $stmt->bindValue(':lastName', $userLastName, PDO::PARAM_STR);
    $stmt->bindValue(':email', $userEmail, PDO::PARAM_STR);
    $stmt->bindValue(':password', $userPassword, PDO::PARAM_STR);

    // Perform the insert with the data
    $stmt->execute();

    // Verify success with a row-changed count
    $rowsChanged = $stmt->rowCount();
    // Close the connection
    $stmt->closeCursor();
    // Return the info that verifies success
    return $rowsChanged;
}


// Get user data based on an email address
function getUser($userEmail){
    $db = dbConnect();
    $sql = 'SELECT userId, userFirstName, userLastName, userEmail, 
            userLevel, userPassword FROM user_data WHERE userEmail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $userEmail, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}

// Get user data based on their ID number
function getUserById($userId){
    $db = dbConnect();
    $sql = 'SELECT userId, userFirstName, userLastName, userEmail, 
            userLevel, userPassword FROM user_data WHERE userId = :userId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}

 // Update altered user info in the database
 function updateUser($userFirstName, $userLastName, $userEmail, $userId) {

    // Set the connection up
    $db = dbConnect();
    // Build the insert statement into a variable
    $sql = 'UPDATE user_data SET userFirstName = :firstName,
                userLastName = :lastName, userEmail = :email WHERE userId = :userId';
    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':firstName', $userFirstName, PDO::PARAM_STR);
    $stmt->bindValue(':lastName', $userLastName, PDO::PARAM_STR);
    $stmt->bindValue(':email', $userEmail, PDO::PARAM_STR);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT); 

    // Perform the insert with the data
    $stmt->execute();

    // Verify success with a row-changed count
    $rowsChanged = $stmt->rowCount();
    // Close the connection
    $stmt->closeCursor();
    // Return the info that verifies success
    return $rowsChanged;
}

 // Update altered user password in the database
 function updatePassword($userPassword, $userId) {

    // Set the connection up
    $db = dbConnect();
    // Build the insert statement into a variable
    $sql = 'UPDATE user_data SET userPassword = :password WHERE userId = :userId';
    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':password', $userPassword, PDO::PARAM_STR);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT); 

    // Perform the insert with the data
    $stmt->execute();

    // Verify success with a row-changed count
    $rowsChanged = $stmt->rowCount();
    // Close the connection
    $stmt->closeCursor();
    // Return the info that verifies success
    return $rowsChanged;
}

function deleteSave($trackerId) {

    $db = dbConnect(); 
    $sql = 'DELETE FROM trackers WHERE trackerId = :trackerId'; 
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':trackerId', $trackerId, PDO::PARAM_INT); 
    $stmt->execute(); 
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor(); 
    return $rowsChanged;
}

function deleteSpend($trackerId) {

    $db = dbConnect(); 
    $sql = 'DELETE FROM spendtrackers WHERE spendTrackerId = :spendTrackerId'; 
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':spendTrackerId', $trackerId, PDO::PARAM_INT); 
    $stmt->execute(); 
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor(); 
    return $rowsChanged;
}

function deleteDebt($trackerId) {

    $db = dbConnect(); 
    $sql = 'DELETE FROM debttrackers WHERE debtTrackerId = :debtTrackerId'; 
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':debtTrackerId', $trackerId, PDO::PARAM_INT); 
    $stmt->execute(); 
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor(); 
    return $rowsChanged;
}

?>