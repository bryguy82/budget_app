<?php
/**
 * DATABASE CONNECTION
 */
function dbConnect()
{
    $server = "localhost";
    $database = "budget";
    $user = "iClient";
    $password = "w6zqDoLAMp6XEaBK";

    $dsn = 'mysql:host=' . $server . ';dbname=' . $database;
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $siteLink = new PDO($dsn, $user, $password, $options);
        return $siteLink;
    } catch (PDOException $exc) {
        // Go to an error page
        header('location: /budget/view/500.php');
        exit;
    }
}

dbConnect();

?>
