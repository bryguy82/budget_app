<?php

/**
 * insert new tracker
 */
function createSpendTracker($trackName, $trackType, $spendingGoal, $userId){

    $db = dbConnect();
    $sql = 'INSERT INTO spendTrackers (trackerName, trackerType, spendingGoal, userId)
            VALUES (:trackName, :trackType, :spendingGoal, :userId)';

    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':trackName', $trackName, PDO::PARAM_STR);
    $stmt->bindValue(':trackType', $trackType, PDO::PARAM_STR);
    $stmt->bindValue(':spendingGoal', $spendingGoal, PDO::PARAM_INT);
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
function getSpendTrackers($userId, $type) {

    $db = dbConnect();
    $sql = 'SELECT * FROM spendTrackers WHERE userId = :userId AND trackerType = :type';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}

// Get tracker saving table
function getSpendByTrackerId($spendTrackerId) {

    $db = dbConnect();
    $sql = 'SELECT * FROM spend WHERE spendTrackerId = :spendTrackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':spendTrackerId', $spendTrackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

// Get tracker main data
function getSpendTrackerSourceByTrackerId($spendTrackerId) {

    $db = dbConnect();
    $sql = 'SELECT * FROM spendTrackers WHERE spendTrackerId = :spendTrackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':spendTrackerId', $spendTrackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

// Insert new row to saving table
function insertSpendTracker($spendDate, $category, $name, $start, $amountSpent, $total, $spendTrackerId) {

    $db = dbConnect();
    $sql = 'INSERT INTO spend (spendDate, category, name, start, spendAmount, total, spendTrackerId)
            VALUES (:spendDate, :category, :name, :start, :amountSpent, :total, :spendTrackerId)';
    
    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':spendDate', $spendDate, PDO::PARAM_STR);
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->bindValue(':amountSpent', $amountSpent, PDO::PARAM_INT);
    $stmt->bindValue(':total', $total, PDO::PARAM_INT);
    $stmt->bindValue(':spendTrackerId', $spendTrackerId, PDO::PARAM_INT);

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
function getMaxSpendStart($spendTrackerId) {

    $db = dbConnect();
    $sql = 'SELECT MAX(total) AS total FROM spend WHERE spendTrackerId = :spendTrackerId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':spendTrackerId', $spendTrackerId, PDO::PARAM_INT);
    $stmt->execute();
    $trackerData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $trackerData;
}

?>