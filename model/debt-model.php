<?php

/**
 * insert new tracker
 */
function createDebtTracker($trackName, $trackCategory, $trackRate, $trackTerm, $trackLoanValue, $userId){

    $db = dbConnect();
    $sql = 'INSERT INTO debttrackers (name, category, interest, term, loanValue, userId)
            VALUES (:trackName, :trackCategory, :trackRate, :trackTerm, :trackLoanValue, :userId)';

    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':trackName', $trackName, PDO::PARAM_STR);
    $stmt->bindValue(':trackCategory', $trackCategory, PDO::PARAM_STR);
    $stmt->bindValue(':trackRate', $trackRate, PDO::PARAM_INT);
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

// Get user tracker based on userId
function getDebtTrackers($userId) {

    $db = dbConnect();
    $sql = 'SELECT * FROM debttrackers WHERE userId = :userId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}

// Get tracker debt table
function getDebtByTrackerId($debtTrackerId) {

    $db = dbConnect();
    $sql = 'SELECT * FROM debt WHERE debtTrackerId = :debtTrackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':debtTrackerId', $debtTrackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

// Get tracker main data
function getDebtTrackerSourceByTrackerId($debtTrackerId) {
/////////////////////////////////////////////////////////////
    $db = dbConnect();
    $sql = 'SELECT * FROM debttrackers WHERE debtTrackerId = :debtTrackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':debtTrackerId', $debtTrackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

// Insert new row to debt table
function insertDebtTracker($saveDate, $start, $curPayment, $calcInterest, $calcPrincipal, $curBalance, $totInterest, $debtTrackerId) {
/////////////////////////////////////////////////////////////
    $db = dbConnect();

    $sql = 'INSERT INTO debt (date, start, curPayment, calcInterest, calcPrincipal, curBalance, totInterest, debtTrackerId)
            VALUES (:saveDate, :start, :curPayment, :calcInterest, :calcPrincipal, :curBalance, :totInterest, :debtTrackerId)';
    
    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':saveDate', $saveDate, PDO::PARAM_STR);
    $stmt->bindValue(':start', $start, PDO::PARAM_STR);
    $stmt->bindValue(':curPayment', $curPayment, PDO::PARAM_INT);
    $stmt->bindValue(':calcInterest', $calcInterest, PDO::PARAM_INT);
    $stmt->bindValue(':calcPrincipal', $calcPrincipal, PDO::PARAM_INT);
    $stmt->bindValue(':curBalance', $curBalance, PDO::PARAM_INT);
    $stmt->bindValue(':totInterest', $totInterest, PDO::PARAM_INT);
    $stmt->bindValue(':debtTrackerId', $debtTrackerId, PDO::PARAM_INT);

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
function getMinStart($debtTrackerId) {
/////////////////////////////////////////////////////////////
    $db = dbConnect();
    $sql = 'SELECT MIN(curBalance) AS total FROM debt WHERE debtTrackerId = :debtTrackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':debtTrackerId', $debtTrackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

/**
 * Get max total value from tracker
 */
function getTotalInterest($debtTrackerId) {
/////////////////////////////////////////////////////////////
    $db = dbConnect();
    $sql = 'SELECT MAX(totInterest) AS total FROM debt WHERE debtTrackerId = :debtTrackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':debtTrackerId', $debtTrackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

?>