<?php
/**
 * SPENDING CONTROLLER
 */

// Create or access a Session 
session_start();

// Get the database connection file
require_once '../library/connection.php';
require_once '../library/functions.php';
require_once '../model/spend-model.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

$type = "spend";

switch ($action){

    case 'spend':
        include '../view/manage_spend.php';
        break;

    case 'addSpend':
        include '../view/add_spend.php';
        break;

    case 'TrackSpend':

        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $spendingGoal = filter_input(INPUT_POST, 'spendingGoal', FILTER_SANITIZE_NUMBER_INT);

        if (empty($name) || empty($spendingGoal)) {
            $message = "<p>All data for the tracker must be completed.  Please try again.</p>";
            include "../view/add_spend.php";
            exit;
        }

        // Insert data into the database
        $insertResult = createSpendTracker($name, $type, $spendingGoal, $userId);

        if ($insertResult === 1) {
            $message = "<p>Congratulations, your saving tracker was successfully added.</p>";
            include "../view/manage_spend.php";
            exit;
        } else {
            $message = "<p>Sorry, adding your tracker failed.  Please try again.</p>";
            header("Location: /budget/spending/?action=addSpend");
            exit;
        }
        break;

    case 'ViewSpend':

        $spendTrackerId = filter_input(INPUT_GET, 'spendTrackerId', FILTER_SANITIZE_NUMBER_INT);

        // Get tracker data
        $trackerData = getSpendByTrackerId($spendTrackerId);
        $trackerSource = getSpendTrackerSourceByTrackerId($spendTrackerId);
        $trackerName = $trackerSource['trackerName'];

        if(!count($trackerData) && !count($trackerSource)){
            $message = "<p class='notice'>Sorry, no tracker data could be found.</p>";
        } else {
            // build display for data
            $trackerDisplay = buildSpendData($trackerData);
        }

        // Data to be viewed on this page
        include '../view/view_spend.php';
        break;

    case 'SpendNewEntry':

        $spendTrackerId = filter_input(INPUT_POST, 'spendTrackerId', FILTER_SANITIZE_NUMBER_INT);
        $spendDate = filter_input(INPUT_POST, 'spendDate', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_NUMBER_INT);
        $amountSpent = filter_input(INPUT_POST, 'amountSpent', FILTER_SANITIZE_NUMBER_INT);

        if (empty($spendDate) || empty($category) || empty($name) || empty($start) && $start != 0 || empty($amountSpent)) {
            $message = "<p>All input data must be completed.  Please try again.</p>";
            include "../view/view_spend.php";
            exit;
        }

        // Convert date for database
        $d=strtotime($spendDate);
        $spendDate = date("Y-m-d h:i:s", $d);

        // Get tracker startup data from tracker table (spendingGoal)
        $trackerSource = getSpendTrackerSourceByTrackerId($spendTrackerId);
        // $trackerSource['spendingGoal']

        // calculate spend total
        $total = $start + $amountSpent;

        // Function to insert into DB here
        $insertResult = insertSpendTracker($spendDate, $category, $name, $start, $amountSpent, $total, $spendTrackerId);

        if ($insertResult === 1) {
            $message = "<p>Congratulations, your entry was successfully added.</p>";
            header("Location: /budget/spending/?action=ViewSpend&spendTrackerId=".urldecode($spendTrackerId));
            // include "../view/manage_spend.php";
            exit;
        } else {
            $message = "<p>Sorry, adding your tracker failed.  Please try again.</p>";
            include "../view/view_spend.php";
            exit;
        }
        break;

    case 'SpendEntry':

        $spendTrackerId = filter_input(INPUT_POST, 'spendTrackerId', FILTER_SANITIZE_NUMBER_INT);
        $spendDate = filter_input(INPUT_POST, 'spendDate', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $amountSpent = filter_input(INPUT_POST, 'amountSpent', FILTER_SANITIZE_NUMBER_INT);

        if (empty($spendDate) || empty($category) || empty($name) || empty($amountSpent)) {
            $message = "<p>All input data must be completed.  Please try again.</p>";
            include "../view/view_spend.php";
            exit;
        }

        // Convert date for database
        $d=strtotime($spendDate);
        $spendDate = date("Y-m-d h:i:s", $d);

        // Get tracker startup data from tracker table (spendingGoal)
        $trackerSource = getSpendTrackerSourceByTrackerId($spendTrackerId);/////////////////////////////////display goal amount

        $startValue = getMaxSpendStart($spendTrackerId);

        // calculate spend total
        $total = $startValue['total'] + $amountSpent;

        // Function to insert into DB here
        $insertResult = insertSpendTracker($spendDate, $category, $name, $startValue['total'], $amountSpent, $total, $spendTrackerId);

        if ($insertResult === 1) {
            $message = "<p>Congratulations, your entry was successfully added.</p>";
            header("Location: /budget/spending/?action=ViewSpend&spendTrackerId=".urldecode($spendTrackerId));
            // include "../view/manage_spend.php";
            exit;
        } else {
            $message = "<p>Sorry, adding your tracker failed.  Please try again.</p>";
            include "../view/view_spend.php";
            exit;
        }
        break;

    default:
        include '../view/home.php';

}


?>