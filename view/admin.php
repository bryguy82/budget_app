<?php

if(!$_SESSION['loggedin']) {
    header('location: /budget/');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="Budget Admin Page">
    <title>Admin | Budget My Life</title>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/header.php'; ?>
    </header>
    <nav>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/nav.php'; ?>
    </nav>
    <main>
        <div class="hero">
            <div>
                <div class="page_title">
                    <h1>Admin Page</h1>
                </div>
                <!-- <picture class="hero_image">
                    <source media="(max-width: 400px)" srcset="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_400.jpg">
                    <source media="(max-width: 650px)" srcset="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_650.jpg">
                    <img title="Make a Change"  src="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_900.jpg" alt="Woman holding coins in her hands">
                </picture> -->
            </div>
        </div>

        <div class="error_message">
            <!-- Display an error message if one exists -->
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
        </div>

        <article class="trackers">
            <div>
                <div class="user">
                    <h3>User data</h3>
                    <ul>
                        <li>First Name = <?php echo $_SESSION['userData']['userFirstName']; ?></li>
                        <li>Last Name = <?php echo $_SESSION['userData']['userLastName']; ?></li>
                        <li>Email = <?php echo $_SESSION['userData']['userEmail']; ?></li>
                    </ul>
                </div>
                

                <!-- Tables are displayed with this class <div class="box_1"> -->
                <?php
                    if (isset($saveTable)) {
                        echo $saveTable;
                    } else {
                        echo "<h3>Your save trackers will display here</h3>";
                    }

                    // Add the tables for spend and debt here
                ?>
                
            </div>
        </article>

    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/footer.php'; ?>
    </footer>
    <script src="/budget/js/hamburger.js"></script>
</body>

</html>
