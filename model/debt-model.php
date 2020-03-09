<?php


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