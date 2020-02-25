<?php
/**
 * PROGRAM FUNCTIONS
 */

// Check the email requirements
function checkEmail($userEmail){
    $valEmail = filter_var($userEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

/**
 * Check the password for a minimum of 8 characters,
 * at least one 1 capital letter, at least 1 number and
 * at least 1 special character
 */
function checkPassword($userPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $userPassword);
}

/**
 * Build the HTML for saving trackers in the DB
 */
function buildSaveTrackers($trackerList){

    $trackerBoxes = "";
    foreach ($trackerList as $tracker) {
        $trackerBoxes .= "<div class='box_1'>";
        $trackerBoxes .= "<a href='/budget/saving/?action=ViewSave&trackerId=".urldecode($tracker['trackerId'])."'>";
        // $trackerBoxes .= "<img src='/budget/images/travel-clipart-man_100.png' alt='Man with suitcase icon'>";
        $trackerBoxes .= "<h2>".$tracker['trackerName']."</h2>";
        $trackerBoxes .= "<ul>";
        $trackerBoxes .= "<li>Category: ".$tracker['trackerCategory']."</li>";
        $trackerBoxes .= "<li>Interest Rate: ".$tracker['interest']."</li>";
        $trackerBoxes .= "<li>Term: ".$tracker['term']." months</li>";
        $trackerBoxes .= "<li>Goal: $".$tracker['goal']."</li>";
        $trackerBoxes .= "</ul>";
        $trackerBoxes .= "</a>";
        $trackerBoxes .= "</div>";
    }
    return $trackerBoxes;
}

/**
 * Table view for save trackers on admin page
 */
function buildSaveAdminTable($saveList) {

    $trackerTable = "<div class='box_1'>";
    $trackerTable .= "<table>";
    $trackerTable .= "<tr>";
    $trackerTable .= "<th>Name</th>";
    $trackerTable .= "<th>Category</th>";
    $trackerTable .= "<th>Interest Rate</th>";
    $trackerTable .= "<th>Term</th>";
    $trackerTable .= "<th>Goal</th>";
    $trackerTable .= "<th>View</th>";
    $trackerTable .= "</tr>";
    foreach ($saveList as $tracker) {
       $trackerTable .= "<tr>";
       $trackerTable .= "<td>".$tracker['trackerName']."</td>";
       $trackerTable .= "<td>".$tracker['trackerCategory']."</td>";
       $trackerTable .= "<td>".$tracker['interest']."</td>";
       $trackerTable .= "<td>".$tracker['term']."</td>";
       $trackerTable .= "<td>".$tracker['goal']."</td>";
       $trackerTable .= "<td><a href='/budget/saving/?action=ViewSave&trackerId=".urldecode($tracker['trackerId'])."'>View</a></td>";
       $trackerTable .= "</tr>";    
    }
    $trackerTable .= "</table>";
    $trackerTable .= "</div>";

    return $trackerTable;
}

/**
 * Table view for data in Save tracker
 */
function buildSaveData($trackerData) {

    $data = "";
    foreach ($trackerData as $entry) {
        $data .= "<tr>";
        $data .= "<td>".$entry['saveDate']."</td>";
        $data .= "<td>".$entry['start']."</td>";
        $data .= "<td>".$entry['deposit']."</td>";
        $data .= "<td>".$entry['interestEarned']."</td>";
        $data .= "<td>".$entry['total']."</td>";
        $data .= "</tr>";
    }

    return $data;
}

/**
 * Calculate the interest earned and total for save entry
 */
function calculateSaveEntry($start, $deposit, $interest) {

    $earned = ($start + $deposit) * ($interest / 1200); // 5% -> .05/12
    $total = $start + $deposit + $earned;

    return array($earned, $total);
}

?>
