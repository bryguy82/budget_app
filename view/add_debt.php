<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="New Debt Tracker Page">
    <title>New Debt Tracker | Budget My Life</title>
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

        <div class="trackers">
            <div>
            <!-- Calculator for the number of periods -->
                <div class="box_2">
                    <div>
                        <h2>Debt Calculator</h2>
                        <p>If you have a goal value in mind, use this calculator to determine how long it will take to reach that dollar amount.</p>
                        <p>Enter in your bank's interest rate, the regular deposit amount, an initial value, and your desired future value.</p>
                        <p>* All values are required. *</p>
                    </div>
                    <fieldset class="calculate">
                        <label>
                            Rate<span> *</span>
                            <input type="number" name="rate" id="nrate" placeholder="5%" required>
                        </label>
                        <label>
                            Deposit Amount<span> *</span>
                            <input type="number" name="payment" id="npayment" placeholder="$100" required>
                        </label>
                        <label>
                            Starting Value<span> *</span>
                            <input type="number" name="present_value" id="npresent_value" placeholder="$1000" required>
                        </label>
                        <label>
                            Future Value<span> *</span>
                            <input type="number" name="future_value" id="nfuture_value" placeholder="$100000" required>
                        </label>
                        <div class="login_button">
                            <button onclick="nper()">Get Total Periods</button>
                        </div>
                        <label>
                            Number of Periods
                            <input type="number" name="periods" id="nperiods" readonly>
                        </label>
                    </fieldset>
                </div>
            </div>
        </div>

        <article class="trackers">
            <div>
            <!-- Form to create a tracker -->
                <div class="box_2">
                    <div>
                        <h2>Start your Debt Tracker</h2>
                        <p>Now that you've had a chance to select your parameters, let us help you reach your goal!</p>
                        <p>Enter in the following data to get started!</p>
                        <p>* All values are required. *</p>
                    </div>
                    <form class="login input" action="/budget/saving/index.php" method="post">
                        <fieldset>
                            <label>
                                Tracker Name<span> *</span>
                                <input type="text" name="name" placeholder="My Vacation" required>
                            </label>
                            <label>
                                Category<span> *</span>
                                <select name="category" id="category">
                                    <option value="Cruise">Cruise</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Vacation">Vacation</option>
                                    <option value="Home">Home</option>
                                    <option value="Car">Car</option>
                                    <option value="College Fund">College Fund</option>
                                    <option value="Rainy Day Fund">Rainy Day Fund</option>
                                    <option value="Retirement">Retirement</option>
                                    <option value="Other">Other</option>
                                </select>
                            </label>
                            <label>
                                Interest Rate<span> *</span>
                                <input type="number" name="rate" placeholder="5%" required>
                            </label>
                            <label>
                                Saving Term<span> *</span>
                                <input type="number" name="term" placeholder="60 months" required>
                            </label>
                            <label>
                                Future Value Goal<span> *</span>
                                <input type="number" name="futureValue" placeholder="$100000" required>
                            </label>
                            <div class="login_button">
                                <input type="submit" name="submit" value="Start my Tracker">
                                <!-- Add the action key and value pair -->
                                <input type="hidden" name="action" value="TrackSave">
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
