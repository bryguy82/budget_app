<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="Budget Manage Spending Page">
    <title>Spending | Budget My Life</title>
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
                    <h1>Good Budgeting Starts With Spending Discipline</h1>
                </div>
                <picture class="hero_image">
                    <source media="(max-width: 400px)" srcset="/budget/images/artem-beliaikin-49mCO5ZRQDk-unsplash_400.jpg">
                    <source media="(max-width: 650px)" srcset="/budget/images/artem-beliaikin-49mCO5ZRQDk-unsplash_650.jpg">
                    <img title="Shopping"  src="/budget/images/artem-beliaikin-49mCO5ZRQDk-unsplash_900.jpg" alt="Window shopping sale">
                </picture>
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
                <div class="info">
                    <div class="info_header">
                        <h2>Spending Trackers</h2>
                    </div>
                </div>

                <!-- class box_1 for any saved trackers to be displayed -->
                <?php

                    if(isset($_SESSION['loggedin'])) {
                        echo "<div class='tracker_link'>
                                  <div><a href='/budget/spending/?action=addSpend'>Start a New Tracker</a></div>
                              </div>";

                        $spend = getSpendTrackers($_SESSION['userData']['userId'], $type);
                            
                        if (sizeof($spend) > 0) {
                            $spendTrackersData = buildSpendTrackers($spend);
                            echo $spendTrackersData;
                        }
                    } else {
                        echo 
                        "<div class='info'>
                            <div>
                                <p>It looks like you haven't started any spending trackers yet.</p>
                                <p>Your trackers will appear here after logging in and creating them.</p>
                                <p>Click below to set up your user account to begin tracking or login to check your progress.</p>
                                <div class='abutton'><a href='/budget/accounts/?action=Login' title='My Account'>Track My Spending</a></div>
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </article>

        <article class="tips">
            <div>
                <div class="info">
                    <!-- <div class="info_header">
                        <h2>Budgeting Tips & Tricks</h2>
                    </div>
                    <picture class="info_image">
                        <source media="(max-width: 400px)" srcset="/budget/images/budget_tips_350.jpg">
                        <img title="Budget charts"  src="/budget/images/budget_tips_550.jpg" alt="Budget charts">
                    </picture>
                    <div class="info_text">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    </div> -->
                </div>
            </div>
        </article>
        
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/footer.php'; ?>
    </footer>
    <script src="/budget/js/hamburger.js"></script>
</body>

</html>
