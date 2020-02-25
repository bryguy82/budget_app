<?php
/**
 * SAVING CONTROLLER
 */

// Create or access a Session 
session_start();

// Get the database connection file
require_once '../library/connection.php';
require_once '../library/functions.php';
require_once '../model/save-model.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

$type = "save";

switch ($action){

    case 'save':
        include '../view/manage_save.php';
        break;

    case 'addSave':
        include '../view/add_save.php';
        break;

    case 'TrackSave':

        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_NUMBER_INT);
        $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_NUMBER_INT);
        $futureValue = filter_input(INPUT_POST, 'futureValue', FILTER_SANITIZE_NUMBER_INT);

        if (empty($name) || empty($category) || empty($rate) || empty($term) || empty($futureValue)) {
            $message = "<p>All data for the tracker must be completed.  Please try again.</p>";
            include "../view/add_save.php";
            exit;
        }

        $insertResult = createSaveTracker($name, $type, $category, $rate, $term, $futureValue, $userId);

        // $save = getSaveTrackers($userId, $type);

        if ($insertResult === 1) {
            // $saveTrackersData = buildSaveTrackers($save);
            $message = "<p>Congratulations, your saving tracker was successfully added.</p>";
            include "../view/manage_save.php";
            exit;
        } else {
            $message = "<p>Sorry, adding your tracker failed.  Please try again.</p>";
            header("Location: /budget/saving/?action=addSave");
            exit;
        }
        break;

    case 'ViewSave':

        // Data to be viewed on this page
        include '../view/view_save.php';
        break;


    default:
        include '../view/home.php';
}


?>
