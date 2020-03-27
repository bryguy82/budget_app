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
 * Build the HTML for spending trackers in the DB
 */
function buildSpendTrackers($trackerList){

    $trackerBoxes = "";
    foreach ($trackerList as $tracker) {
        $trackerBoxes .= "<div class='box_1'>";
        $trackerBoxes .= "<a href='/budget/spending/?action=ViewSpend&spendTrackerId=".urldecode($tracker['spendTrackerId'])."'>";
        // $trackerBoxes .= "<img src='/budget/images/travel-clipart-man_100.png' alt='Man with suitcase icon'>";
        $trackerBoxes .= "<h2>".$tracker['trackerName']."</h2>";
        $trackerBoxes .= "<ul>";
        $trackerBoxes .= "<li>Goal: $".$tracker['spendingGoal']."</li>";
        $trackerBoxes .= "</ul>";
        $trackerBoxes .= "</a>";
        $trackerBoxes .= "</div>";
    }
    return $trackerBoxes;
}

/**
 * Build the HTML for debt trackers in the DB
 */
function buildDebtTrackers($trackerList){

    $trackerBoxes = "";
    foreach ($trackerList as $tracker) {
        $trackerBoxes .= "<div class='box_1'>";
        $trackerBoxes .= "<a href='/budget/debt/?action=ViewDebt&trackerId=".urldecode($tracker['debtTrackerId'])."'>";
        // $trackerBoxes .= "<img src='/budget/images/travel-clipart-man_100.png' alt='Man with suitcase icon'>";
        $trackerBoxes .= "<h2>".$tracker['name']."</h2>";
        $trackerBoxes .= "<ul>";
        $trackerBoxes .= "<li>Category: ".$tracker['category']."</li>";
        $trackerBoxes .= "<li>Interest Rate: ".$tracker['interest']."</li>";
        $trackerBoxes .= "<li>Term: ".$tracker['term']." months</li>";
        $trackerBoxes .= "<li>Loan Value: $".$tracker['loanValue']."</li>";
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
    $trackerTable .= "<h2>Save Trackers</h2>";
    $trackerTable .= "<table>";
    $trackerTable .= "<tr>";
    $trackerTable .= "<th>Name</th>";
    $trackerTable .= "<th class='hide'>Category</th>";
    $trackerTable .= "<th class='hide'>Interest Rate</th>";
    $trackerTable .= "<th class='hide'>Term</th>";
    $trackerTable .= "<th>Goal</th>";
    $trackerTable .= "<th>Tracker</th>";
    $trackerTable .= "</tr>";
    foreach ($saveList as $tracker) {
       $trackerTable .= "<tr>";
       $trackerTable .= "<td>".$tracker['trackerName']."</td>";
       $trackerTable .= "<td class='hide'>".$tracker['trackerCategory']."</td>";
       $trackerTable .= "<td class='hide'>".$tracker['interest']." %</td>";
       $trackerTable .= "<td class='hide'>".$tracker['term']."</td>";
       $trackerTable .= "<td>$".$tracker['goal']."</td>";
       $trackerTable .= 
         "<td>
            <a href='/budget/saving/?action=ViewSave&trackerId=".urldecode($tracker['trackerId'])."'>View</a> |
            <a href='/budget/accounts/?action=DeleteSave&trackerId=".urldecode($tracker['trackerId'])
            ."&trackerName=".$tracker['trackerName']."'><span class='warning'>Delete</span></a>
         </td>";
       $trackerTable .= "</tr>";    
    }
    $trackerTable .= "</table>";
    $trackerTable .= "</div>";

    return $trackerTable;
}

/**
 * Table view for spend trackers on admin page
 */
function buildSpendAdminTable($spendList) {

    $trackerTable = "<div class='box_1'>";
    $trackerTable .= "<h2>Spend Trackers</h2>";
    $trackerTable .= "<table>";
    $trackerTable .= "<tr>";
    $trackerTable .= "<th>Name</th>";
    $trackerTable .= "<th>Goal</th>";
    $trackerTable .= "<th>Tracker</th>";
    $trackerTable .= "</tr>";
    foreach ($spendList as $tracker) {
       $trackerTable .= "<tr>";
       $trackerTable .= "<td>".$tracker['trackerName']."</td>";
       $trackerTable .= "<td>$".$tracker['spendingGoal']."</td>";
       $trackerTable .= 
         "<td>
           <a href='/budget/spending/?action=ViewSpend&spendTrackerId=".urldecode($tracker['spendTrackerId'])."'>View</a> |
           <a href='/budget/accounts/?action=DeleteSpend&trackerId=".urldecode($tracker['spendTrackerId'])
           ."&trackerName=".$tracker['trackerName']."'><span class='warning'>Delete</span></a>
          </td>";
       $trackerTable .= "</tr>";    
    }
    $trackerTable .= "</table>";
    $trackerTable .= "</div>";

    return $trackerTable;
}

/**
 * Table view for spend trackers on admin page
 */
function buildDebtAdminTable($debtList) {

    $trackerTable = "<div class='box_1'>";
    $trackerTable .= "<h2>Debt Trackers</h2>";
    $trackerTable .= "<table>";
    $trackerTable .= "<tr>";
    $trackerTable .= "<th>Name</th>";
    $trackerTable .= "<th class='hide'>Category</th>";
    $trackerTable .= "<th class='hide'>Interest Rate</th>";
    $trackerTable .= "<th class='hide'>Term</th>";
    $trackerTable .= "<th>Loan Value</th>";
    $trackerTable .= "<th>Tracker</th>";
    $trackerTable .= "</tr>";
    foreach ($debtList as $tracker) {
       $trackerTable .= "<tr>";
       $trackerTable .= "<td>".$tracker['name']."</td>";
       $trackerTable .= "<td class='hide'>".$tracker['category']."</td>";
       $trackerTable .= "<td class='hide'>".$tracker['interest']." %</td>";
       $trackerTable .= "<td class='hide'>".$tracker['term']."</td>";
       $trackerTable .= "<td>$".$tracker['loanValue']."</td>";
       $trackerTable .= 
         "<td>
            <a href='/budget/debt/?action=ViewDebt&trackerId=".urldecode($tracker['debtTrackerId'])."'>View</a> |
            <a href='/budget/accounts/?action=DeleteDebt&trackerId=".urldecode($tracker['debtTrackerId'])
            ."&trackerName=".$tracker['name']."'><span class='warning'>Delete</span></a>
         </td>";
       $trackerTable .= "</tr>";    
    }
    $trackerTable .= "</table>";
    $trackerTable .= "</div>";

    return $trackerTable;
}

/**
 * Table view for data in Save tracker
 */
function buildSaveData($trackerData, $goal=NULL) {

    $data = "";
    foreach ($trackerData as $entry) {
        $data .= "<tr>";
        $data .= "<td>".$entry['saveDate']."</td>";
        $data .= "<td>$".$entry['start']."</td>";
        $data .= "<td class='hide'>$".$entry['deposit']."</td>";
        $data .= "<td class='hide'>$".$entry['interestEarned']."</td>";
        $data .= "<td>$".$entry['total']."</td>";
        $data .= "</tr>";
    }
    if($goal != NULL) {
        $data .= "<tr>";
        $data .= "<td>Amount</td>";
        $data .= "<td>to go:</td>";
        $data .= "<td class='hide'></td>";
        $data .= "<td class='hide'></td>";
        $data .= "<td>$".$goal."</td>";
        $data .= "</tr>";
    }

    return $data;
}

/**
 * Table view for data in Spend tracker
 */
function buildSpendData($trackerData, $remaining = NULL) {

    $data = "";
    foreach ($trackerData as $entry) {
        $data .= "<tr>";
        $data .= "<td>".$entry['spendDate']."</td>";
        $data .= "<td>".$entry['category']."</td>";
        $data .= "<td class='hide'>".$entry['name']."</td>";
        $data .= "<td class='hide'>$".$entry['start']."</td>";
        $data .= "<td class='hide'>$".$entry['spendAmount']."</td>";
        $data .= "<td>$".$entry['total']."</td>";
        $data .= "</tr>";
    }
    if($remaining != NULL) {
        $data .= "<tr>";
        $data .= "<td>Budget</td>";
        $data .= "<td>remaining:</td>";
        $data .= "<td class='hide'></td>";
        $data .= "<td class='hide'></td>";
        $data .= "<td class='hide'></td>";
        $data .= "<td>$".$remaining."</td>";
        $data .= "</tr>";
    }

    return $data;
}

/**
 * Table view for data in Debt tracker
 */
function buildDebtData($trackerData) {

    $data = "";
    foreach ($trackerData as $entry) {
        $data .= "<tr>";
        $data .= "<td>".$entry['date']."</td>";
        $data .= "<td>$".$entry['start']."</td>";
        $data .= "<td class='hide'>$".$entry['curPayment']."</td>";
        $data .= "<td class='hide'>$".$entry['calcInterest']."</td>";
        $data .= "<td class='hide'>$".$entry['calcPrincipal']."</td>";
        $data .= "<td>$".$entry['curBalance']."</td>";
        $data .= "<td>$".$entry['totInterest']."</td>";
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

/**
 * Calculate the interest earned and total for debt entry
 */
function calculateDebtEntry($start, $curPayment, $interest) {

    $calInterest = $start * ($interest / 1200); // 5% -> .05/12
    $calcPrincipal = $curPayment - $calInterest;

    return array($calInterest, $calcPrincipal);
}


?>