<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="Budget Manage Debt Page">
    <title>Debt | Budget My Life</title>
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
                    <h1>The Burden of Debt Will Soon Be a Thing of the Past</h1>
                </div>
                <picture class="hero_image">
                    <source media="(max-width: 400px)" srcset="/budget/images/financial_freedom_400.jpg">
                    <source media="(max-width: 650px)" srcset="/budget/images/financial_freedom_650.jpg">
                    <img title="Financial Freedom"  src="/budget/images/financial_freedom_900.jpg" alt="Financial freedom arrow pointing">
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
                        <h2>Debt Trackers</h2>
                    </div>
                </div>

                <!-- class box_1 for any saved trackers to be displayed -->
                <?php

                    if(isset($_SESSION['loggedin'])) {
                        echo "<div class='tracker_link'>
                                  <div><a href='/budget/debt/?action=addDebt'>Start a New Tracker</a></div>
                              </div>";

                        $debt = getDebtTrackers($_SESSION['userData']['userId'], $type);

                        if (sizeof($debt) > 0) {
                            $debtTrackersData = buildDebtTrackers($debt);
                            echo $debtTrackersData;
                        }
                    } else {
                        echo 
                        "<div class='info'>
                            <div>
                                <p>It looks like you haven't started any debt trackers yet.</p>
                                <p>Your trackers will appear here after logging in and creating them.</p>
                                <p>Click below to set up your user account to begin tracking or login to check your progress.</p>
                                <div class='abutton'><a href='/budget/accounts/?action=Login' title='My Account'>Track My Debt</a></div>
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </article>

        <article class="tips">
            <div>
                <div class="info">
                    <div class="info_header">
                        <h2>10 Easy Ways to Pay Off Debt</h2>
                        <h3>by Stephanie Steinberg and Susannah Snider</h3>
                    </div>
                    <picture class="info_image">
                        <source media="(max-width: 400px)" srcset="/budget/images/bailing-adult-debt_350.jpg">
                        <img title="Budget charts"  src="/budget/images/bailing-adult-debt_550.jpg" alt="Budget charts">
                    </picture>
                    <div class="info_text">
                        <ol>
                            <li>Create a budget</li>
                            <li>Pay off the most expensive debt first</li>
                            <li>Pay more than the minimum balance</li>
                            <li>Take advantage of balance transfers</li>
                            <li>Halt your credit card spending</li>
                            <li>Put work bonuses toward debt</li>
                            <li>Delete credit card information from online stores</li>
                            <li>Sell unwanted gifts and household items</li>
                            <li>Change your habits</li>
                            <li>Reward yourself when you reach milestones</li>
                        </ol>
                        <p class="out_link"><a href="https://money.usnews.com/money/personal-finance/debt/articles/easy-ways-to-pay-off-debt" target="_blank">See Full Article</a></p>
                    </div>
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
