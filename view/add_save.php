<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="Budget Create Savings Tracker Page">
    <title>Create Savings Tracker | Budget My Life</title>
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
                    <h1>Create Savings Tracker</h1>
                </div>
            </div>
        </div>

        <div class="trackers">
            <div>
                <!-- Calculator for Future Value -->
                <div class="box_2">
                    <div>
                        <h3>Future Value Calculator</h3>
                        <p>Before you get started, we suggest you use our handy calculators to help you with your goal.</p>
                        <p>Enter in your starting amount, your bank's interest rate, and your desired total.</p>
                    </div>
                    <fieldset class="calculate">
                        <label>
                            Rate<span> *</span>
                            <input type="number" name="rate" id="rate" placeholder="5%" required>
                        </label>
                        <label>
                            Number of Periods<span> *</span>
                            <input type="number" name="periods" id="periods" placeholder="12 (1 year)" required>
                        </label>
                        <label>
                            Deposit Amount<span> *</span>
                            <input type="number" name="payment" id="payment" placeholder="$100" required>
                        </label>
                        <label>
                            Starting Value<span> *</span>
                            <input type="number" name="present_value" id="present_value" placeholder="$1000" required>
                        </label>
                        <div class="login_button">
                            <button onclick="cal_FV()">Get Future Value</button>
                        </div>
                        <label>
                            Future Value = 
                            <input type="number" name="future_value" id="future_value" readonly>
                        </label>
                    </fieldset>
                </div>
                
                <!-- Calculator for the number of periods -->
                <div class="box_2">
                    <div>
                        <h3>Number of Periods Calculator</h3>
                        <p>Before you get started, we suggest you use our handy calculators to help you with your goal.</p>
                        <p>Enter in your starting amount, your bank's interest rate, and your desired total.</p>
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
                            Number of Periods = 
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
                        <h3>Start your savings tracker</h3>
                        <p>Before you get started, we suggest you use our handy calculators to help you with your goal.</p>
                        <p>Enter in your starting amount, your bank's interest rate, and your desired total.</p>
                    </div>
                    <form class="input" action="/budget/saving/index.php" method="post">
                        <fieldset>
                            <label>
                                Tracker Name<span> *</span>
                                <input type="text" name="name" placeholder="My Vacation" required>
                            </label>
                            <label>
                                Category<span> *</span>
                            </label>
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
    <script src="/budget/js/math.js"></script>
</body>

</html>
