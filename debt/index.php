<?php
/**
 * DEBT CONTROLLER
 */

// Create or access a Session 
session_start();

// Get the database connection file
require_once '../library/connection.php';
require_once '../library/functions.php';
require_once '../model/debt-model.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

$type = "debt";

switch ($action){

    case 'debt':
        include '../view/manage_debt.php';
        break;

    case 'addDebt':
        include '../view/add_debt.php';
        break;

    case 'TrackDebt':

        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_NUMBER_INT);
        $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_NUMBER_INT);
        $loanValue = filter_input(INPUT_POST, 'loanValue', FILTER_SANITIZE_NUMBER_INT);

        if (empty($name) || empty($category) || empty($rate) || empty($term) || empty($loanValue)) {
            $message = "<p>All data for the tracker must be completed.  Please try again.</p>";
            include "../view/add_debt.php";
            exit;
        }

        // Insert data into the database
        $insertResult = createDebtTracker($name, $type, $category, $rate, $term, $loanValue, $userId);

        if ($insertResult === 1) {
            $message = "<p>Congratulations, your debt tracker was successfully added.</p>";
            include "../view/manage_debt.php";
            exit;
        } else {
            $message = "<p>Sorry, adding your tracker failed.  Please try again.</p>";
            header("Location: /budget/debt/?action=addDebt");
            exit;
        }
        break;

    case 'ViewDebt':
//////////////////////////////////////////////////////
        $trackerId = filter_input(INPUT_GET, 'trackerId', FILTER_SANITIZE_NUMBER_INT);

        // Get tracker data
        $trackerData = getDebtByTrackerId($trackerId);
        $trackerSource = getDebtTrackerSourceByTrackerId($trackerId);
        $trackerName = $trackerSource['name'];

        if(!count($trackerData) && !($trackerSource)){
            $message = "<p class='notice'>Sorry, no tracker data could be found.</p>";
        } else {
            // build display for data
            $trackerDisplay = buildDebtData($trackerData);
        }

        // Data to be viewed on this page
        include '../view/view_debt.php';
        break;

    case 'DebtNewEntry':
//////////////////////////////////////////////////////////
        $trackerId = filter_input(INPUT_POST, 'trackerId', FILTER_SANITIZE_NUMBER_INT);
        $saveDate = filter_input(INPUT_POST, 'saveDate', FILTER_SANITIZE_STRING);
        $start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_NUMBER_INT);
        $deposit = filter_input(INPUT_POST, 'deposit', FILTER_SANITIZE_NUMBER_INT);

        if (empty($saveDate) || empty($start) || empty($deposit)) {
            $message = "<p>All input data must be completed.  Please try again.</p>";
            include "../view/view_debt.php";
            exit;
        }

        // Convert date for database
        $d=strtotime($saveDate);
        $saveDate = date("Y-m-d h:i:s", $d);

        // Get tracker startup data from tracker table (term, rate)
        $trackerSource = getDebtTrackerSourceByTrackerId($trackerId);
        // $trackerSource['term']
        // $trackerSource['goal']

        // Function to calculate earned and total go here
        list($earned, $total) = calculateDebtEntry($start, $deposit, $trackerSource['interest']);

        // Function to insert into DB here
        $insertResult = insertDebtTracker($date, $initialPayment, $curPayment, $calInterest, $calcPrincipal, $curBalance, $totInterest, $trackerId);

        if ($insertResult === 1) {
            $message = "<p>Congratulations, your entry was successfully added.</p>";
            header("Location: /budget/saving/?action=ViewDebt&trackerId=".urldecode($trackerId));
            // include "../view/manage_save.php";
            exit;
        } else {
            $message = "<p>Sorry, adding your tracker failed.  Please try again.</p>";
            include "../view/view_debt.php";
            exit;
        }
        break;

    case 'DebtEntry':
/////////////////////////////////////////////////////////
        $trackerId = filter_input(INPUT_POST, 'trackerId', FILTER_SANITIZE_NUMBER_INT);
        $saveDate = filter_input(INPUT_POST, 'saveDate', FILTER_SANITIZE_STRING);
        $deposit = filter_input(INPUT_POST, 'deposit', FILTER_SANITIZE_NUMBER_INT);

        if (empty($saveDate) || empty($deposit)) {
            $message = "<p>All input data must be completed.  Please try again.</p>";
            include "../view/view_debt.php";
            exit;
        }

        // Convert date for database
        $d=strtotime($saveDate);
        $saveDate = date("Y-m-d h:i:s", $d);

        // Get tracker startup data from tracker table (term, rate)
        $trackerSource = getTrackerSourceByTrackerId($trackerId);
        // $trackerSource['term']
        // $trackerSource['goal']
        $startValue = getMaxStart($trackerId);

        // Function to calculate earned and total go here
        list($earned, $total) = calculateDebtEntry($startValue['total'], $deposit, $trackerSource['interest']);

        // Function to insert into DB here
        $insertResult = insertDebtTracker($date, $startValue['total'], $curPayment, $calInterest, $calcPrincipal, $curBalance, $totInterest, $trackerId);

        if ($insertResult === 1) {
            $message = "<p>Congratulations, your entry was successfully added.</p>";
            header("Location: /budget/saving/?action=ViewDebt&trackerId=".urldecode($trackerId));
            // include "../view/manage_save.php";
            exit;
        } else {
            $message = "<p>Sorry, adding your tracker failed.  Please try again.</p>";
            include "../view/view_debt.php";
            exit;
        }
        break;

    default:
        include '../view/home.php';

}
?>