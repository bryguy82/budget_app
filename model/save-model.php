<?php
/**
 * insert new tracker
 */
function createSaveTracker($trackName, $trackType, $trackCategory, $trackInterest, $trackTerm, $trackGoal, $userId){

    $db = dbConnect();
    $sql = 'INSERT INTO trackers (trackerName, trackerType, trackerCategory, interest, term, goal, userId)
            VALUES (:trackName, :trackType, :trackCategory, :trackInterest, :trackTerm, :trackGoal, :userId)';

    // Prepare statement using the db connection
    $stmt = $db->prepare($sql);

    // Variable setters
    $stmt->bindValue(':trackName', $trackName, PDO::PARAM_STR);
    $stmt->bindValue(':trackType', $trackType, PDO::PARAM_STR);
    $stmt->bindValue(':trackCategory', $trackCategory, PDO::PARAM_STR);
    $stmt->bindValue(':trackInterest', $trackInterest, PDO::PARAM_INT);
    $stmt->bindValue(':trackTerm', $trackTerm, PDO::PARAM_INT);
    $stmt->bindValue(':trackGoal', $trackGoal, PDO::PARAM_INT);
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
function getSaveTrackers($userId, $type) {

    $db = dbConnect();
    $sql = 'SELECT * FROM trackers WHERE userId = :userId AND trackerType = :type';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}






?>