<?php

/**
 * insert new tracker
 */
function createDebtTracker($trackName, $trackType, $trackCategory, $trackInterest, $trackTerm, $trackLoanValue, $userId){

    $db = dbConnect();
    $sql = 'INSERT INTO debttrackers (trackerName, trackerType, trackerCategory, interest, term, loanValue, userId)
            VALUES (:trackName, :trackType, :trackCategory, :trackInterest, :trackTerm, :trackLoanValue, :userId)';

    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':trackName', $trackName, PDO::PARAM_STR);
    $stmt->bindValue(':trackType', $trackType, PDO::PARAM_STR);
    $stmt->bindValue(':trackCategory', $trackCategory, PDO::PARAM_STR);
    $stmt->bindValue(':trackInterest', $trackInterest, PDO::PARAM_INT);
    $stmt->bindValue(':trackTerm', $trackTerm, PDO::PARAM_INT);
    $stmt->bindValue(':trackLoanValue', $trackLoanValue, PDO::PARAM_INT);
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

// Get user tracker based on userId and type
function getDebtTrackers($userId, $type) {

    $db = dbConnect();
    $sql = 'SELECT * FROM debttrackers WHERE userId = :userId AND trackerType = :type';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}

// Get tracker saving table
function getSaveByTrackerId($trackerId) {

    $db = dbConnect();
    $sql = 'SELECT * FROM save WHERE trackerId = :trackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':trackerId', $trackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

// Get tracker main data
function getTrackerSourceByTrackerId($trackerId) {
/////////////////////////////////////////////////////////////
    $db = dbConnect();
    $sql = 'SELECT * FROM trackers WHERE trackerId = :trackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':trackerId', $trackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

// Insert new row to saving table
function insertSaveTracker($saveDate, $start, $deposit, $earned, $total, $trackerId) {
/////////////////////////////////////////////////////////////
    $db = dbConnect();

    $sql = 'INSERT INTO save (saveDate, start, deposit, interestEarned, total, trackerId)
            VALUES (:saveDate, :start, :deposit, :earned, :total, :trackerId)';
    
    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':saveDate', $saveDate, PDO::PARAM_STR);
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->bindValue(':deposit', $deposit, PDO::PARAM_INT);
    $stmt->bindValue(':earned', $earned, PDO::PARAM_INT);
    $stmt->bindValue(':total', $total, PDO::PARAM_INT);
    $stmt->bindValue(':trackerId', $trackerId, PDO::PARAM_INT);

    // Perform the insert with the data
    $stmt->execute();
    // Verify success with a row-changed count
    $rowsChanged = $stmt->rowCount();
    // Close the connection
    $stmt->closeCursor();
    // Return the info that verifies success
    return $rowsChanged;
}

/**
 * Get max total value from tracker
 */
function getMaxStart($trackerId) {
/////////////////////////////////////////////////////////////
    $db = dbConnect();
    $sql = 'SELECT MAX(total) AS total FROM save WHERE trackerId = :trackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':trackerId', $trackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

?>
