<?php
/**
 * SAVING CONTROLLER
 */

// Get the database connection file
require_once '../library/connection.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}


switch ($action){
    case 'Home':
        include 'budget/view/manage.php';
        break;

    default:
        include 'budget/view/manage.php';
}


?>