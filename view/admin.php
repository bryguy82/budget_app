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
                    <h1>This is the Admin Page</h1>
                </div>
                <!-- <picture class="hero_image">
                    <source media="(max-width: 400px)" srcset="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_400.jpg">
                    <source media="(max-width: 650px)" srcset="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_650.jpg">
                    <img title="Make a Change"  src="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_900.jpg" alt="Woman holding coins in her hands">
                </picture> -->
            </div>
        </div>

        <div>

        </div>

        <article class="trackers">
            <div>
                <div>
                    <h3>User data</h3>
                    <ul>
                        <li>First Name = <?php echo $_SESSION['userData']['userFirstName']; ?></li>
                        <li>Last Name = <?php echo $_SESSION['userData']['userLastName']; ?></li>
                        <li>Email = <?php echo $_SESSION['userData']['userEmail']; ?></li>
                    </ul>
                </div>
                <h3>Your trackers will display here</h3>

                <!-- Tables are displayed with this class <div class="box_1"> -->
                <?php
                    if (isset($saveTable)) {
                        echo $saveTable;
                    }

                    // Add the tables for spend and debt here
                ?>
                
            </div>
        </article>

        <article class="tips">
            <div>
                <!-- <div class="info">
                    <div class="info_header">
                        <h2>Budgeting Tips & Tricks</h2>
                    </div>
                    <picture class="info_image">
                        <source media="(max-width: 400px)" srcset="/budget/images/budget_tips_350.jpg">
                        <img title="Budget charts"  src="/budget/images/budget_tips_550.jpg" alt="Budget charts">
                    </picture>
                    <div class="info_text">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    </div>
                </div> -->
            </div>
        </article>

    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/footer.php'; ?>
    </footer>
    <script src="/budget/js/hamburger.js"></script>
</body>

</html>
