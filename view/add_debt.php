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
                        <h2>Number of Periods Calculator</h2>
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
                            Payment Amount<span> *</span>
                            <input type="number" name="payment" id="npayment" placeholder="-$100" required>
                        </label>
                        <label>
                            Starting Value<span> *</span>
                            <input type="number" name="present_value" id="npresent_value" placeholder="$100000" required>
                        </label>
                        <label>
                            Future Value<span> *</span>
                            <input type="number" name="future_value" id="nfuture_value" placeholder="$0" required>
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

                 <!-- Calculator for Payment Amount -->
                 <div class="box_2">
                    <div>
                        <h2>Payment Calculator</h2>
                        <p>Before you get started, we suggest you use our handy calculators to help you with your goal.</p>
                        <p>This calculator will help you determine a payment amount for your loan.</p>
                        <p>Enter in your bank's interest rate, the time frame as number of periods, the regular payment amount, and an initial value.</p>
                        <p>* All values are required. *</p>
                    </div>
                    <fieldset class="calculate">
                        <label>
                            Rate<span> *</span>
                            <input type="number" name="rate" id="pay_rate" placeholder="5%" required>
                        </label>
                        <label>
                            Number of Periods<span> *</span>
                            <input type="number" name="periods" id="pay_periods" placeholder="360 (30 years)" required>
                        </label>
                        <label>
                            Starting Value<span> *</span>
                            <input type="number" name="present_value" id="pay_present_value" placeholder="$1000" required>
                        </label>
                        <label>
                            Future Value<span> *</span>
                            <input type="number" name="future_value" id="pay_future_value" placeholder="$0" required>
                        </label>
                        <div class="login_button">
                            <button onclick="cal_FV()">Get Future Value</button>
                        </div>
                        <label>
                            Payment Amount
                            <input type="number" name="payment" id="pay_payment" readonly>
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
                    <form class="login input" action="/budget/debt/index.php" method="post">
                        <fieldset>
                            <label>
                                Tracker Name<span> *</span>
                                <input type="text" name="name" placeholder="My Vacation" required>
                            </label>
                            <label>
                                Loan Category<span> *</span>
                                <select name="category" id="category">
                                    <option value="Home Mortgage">Home Mortgage</option>
                                    <option value="Car">Car</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Credit Line">Credit Line</option>
                                    <option value="College Loan">College</option>
                                    <option value="Other">Other</option>
                                </select>
                            </label>
                            <label>
                                Interest Rate<span> *</span>
                                <input type="number" name="rate" placeholder="5%" required>
                            </label>
                            <label>
                                Loan Term<span> *</span>
                                <input type="number" name="term" placeholder="120 months" required>
                            </label>
                            <label>
                                Total Loan Value<span> *</span>
                                <input type="number" name="loanValue" placeholder="$180000" required>
                            </label>
                            <div class="login_button">
                                <input type="submit" name="submit" value="Start my Tracker">
                                <!-- Add the action key and value pair -->
                                <input type="hidden" name="action" value="TrackDebt">
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
    <script src="/budget/js/math.js"></script>
</body>

</html>
