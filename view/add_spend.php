<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="New Spending Tracker Page">
    <title>New Spending Tracker | Budget My Life</title>
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
                    <h1><?php if (isset($trackerName)) {echo $trackerName;} ?> Table</h1>
                </div>
                <!-- <picture class="hero_image">
                    <source media="(max-width: 400px)" srcset="/budget/images/micheile-henderson-ZVprbBmT8QA-unsplash_400.jpg">
                    <source media="(max-width: 650px)" srcset="/budget/images/micheile-henderson-ZVprbBmT8QA-unsplash_650.jpg">
                    <img title="Make a Change"  src="/budget/images/micheile-henderson-ZVprbBmT8QA-unsplash_900.jpg" alt="Woman holding coins in her hands">
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
            <!-- Form to create a tracker -->
                <div class="box_2">
                    <div>
                        <h2>Start your Spending Tracker</h2>
                        <p>Now that you've had a chance to select your parameters, let us help you reach your goal!</p>
                        <p>Enter in the following data to get started!</p>
                        <p>* All values are required. *</p>
                    </div>
                    <form class="login input" action="/budget/spending/index.php" method="post">
                        <fieldset>
                            <label>
                                Tracker Name<span> *</span>
                                <input type="text" name="name" placeholder="My Vacation" required>
                            </label>
                            <label>
                                Monthly Spending Goal<span> *</span>
                                <input type="number" name="spendingGoal" placeholder="$100000" required>
                            </label>
                            <div class="login_button">
                                <input type="submit" name="submit" value="Start my Tracker">
                                <!-- Add the action key and value pair -->
                                <input type="hidden" name="action" value="TrackSpend">
                                <?php
                                    // input field for foreign key userId
                                    echo "<input type='hidden' name='userId' value='";
                                    if (isset($_SESSION['userData']['userId'])){ 
                                        echo $_SESSION['userData']['userId'];
                                    } elseif (isset($userId)){ 
                                        echo $userId;
                                    }
                                    echo "'>";
                                ?>

                            </div>
                        </fieldset>
                    </form>
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
