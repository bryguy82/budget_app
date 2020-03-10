<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="Budget View <?php if (isset($trackerName)) {echo $trackerName;} ?> Tracker Page">
    <title>View <?php if (isset($trackerName)) {echo $trackerName;} ?> Tracker | Budget My Life</title>
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
                <div class="box_1">
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Category</th>
                            <th class='hide'>Name</th>
                            <th class='hide'>Start</th>
                            <th class='hide'>Spent</th>
                            <th>Total</th>
                        </tr>

                        <!-- Table data inserted here -->
                        <?php
                            if (isset($trackerDisplay)) {
                                echo $trackerDisplay;
                            }
                        ?>
                    </table>
                </div>

                <div class="box_2">
                    <div>
                        <h3>Insert New Entry</h3>
                    </div>
                    <form class="input" action="/budget/spending/index.php" method="post">
                        <fieldset class="calculate">

                            <!-- Only first entry will include start value -->
                            <?php
                                if (count($trackerData) == 0) {
                                    echo 
                                    "<label>
                                        Date Spent<span> *</span>
                                        <input type='date' name='spendDate' required>
                                    </label>
                                    <label>
                                        Category<span> *</span>
                                        <select name='category' id='category'>
                                            <option value='Auto & transport'>Auto & transport</option>
                                            <option value='Auto Insurance'>Auto Insurance</option>
                                            <option value='Clothing'>Clothing</option>
                                            <option value='Credit Card payment'>Credit Card payment</option>
                                            <option value='Entertainment'>Entertainment</option>
                                            <option value='Fast food'>Fast food</option>
                                            <option value='Fee'>Fee</option>
                                            <option value='Gas & fuel'>Gas & fuel</option>
                                            <option value='Groceries'>Groceries</option>
                                            <option value='Hobbies'>Hobbies</option>
                                            <option value='Home improvement'>Home improvement</option>
                                            <option value='Home supplies'>Home supplies</option>
                                            <option value='Hotel'>Hotel</option>
                                            <option value='Internet'>Internet</option>
                                            <option value='Other'>Other</option>
                                            <option value='Pharmacy'>Pharmacy</option>
                                            <option value='Phone'>Phone</option>
                                            <option value='Rent/Mortgage'>Rent/Mortgage</option>
                                            <option value='Restaurants'>Restaurants</option>
                                            <option value='Shipping'>Shipping</option>
                                            <option value='Shopping'>Shopping</option>
                                            <option value='Tithing'>Tithing</option>
                                            <option value='Travel'>Travel</option>
                                            <option value='Utilities'>Utilities</option>
                                        </select>
                                    </label>
                                    <label>
                                        Name<span> *</span>
                                        <input type='text' name='name' placeholder='Walmart' required>
                                    </label>
                                    <label>
                                        Starting Value<span> *</span>
                                        <input type='number' name='start' placeholder='$0' required>
                                    </label>
                                    <label>
                                        Amount Spent<span> *</span>
                                        <input type='number' name='amountSpent' placeholder='$100' required>
                                    </label>
                                    <div class='login_button'>
                                        <input type='submit' name='submit' value='Add New Entry'>
                                        <!-- Add the action key and value pair -->
                                        <input type='hidden' name='action' value='SpendNewEntry'>
                                        <input type='hidden' name='spendTrackerId' value='";
                                            if (isset($tracker['spendTrackerId'])) {echo $tracker['spendTrackerId'];}
                                            elseif (isset($spendTrackerId)) {echo $spendTrackerId;}
                                        echo "'>
                                    </div>";
                                } elseif (count($trackerData) > 0) {
                                    echo
                                    "<label>
                                        Date Spent<span> *</span>
                                        <input type='date' name='spendDate' required>
                                    </label>
                                    <label>
                                        Category<span> *</span>
                                        <select name='category' id='category'>
                                            <option value='Auto & transport'>Auto & transport</option>
                                            <option value='Auto Insurance'>Auto Insurance</option>
                                            <option value='Clothing'>Clothing</option>
                                            <option value='Credit Card payment'>Credit Card payment</option>
                                            <option value='Entertainment'>Entertainment</option>
                                            <option value='Fast food'>Fast food</option>
                                            <option value='Fee'>Fee</option>
                                            <option value='Gas & fuel'>Gas & fuel</option>
                                            <option value='Groceries'>Groceries</option>
                                            <option value='Hobbies'>Hobbies</option>
                                            <option value='Home improvement'>Home improvement</option>
                                            <option value='Home supplies'>Home supplies</option>
                                            <option value='Hotel'>Hotel</option>
                                            <option value='Internet'>Internet</option>
                                            <option value='Other'>Other</option>
                                            <option value='Pharmacy'>Pharmacy</option>
                                            <option value='Phone'>Phone</option>
                                            <option value='Rent/Mortgage'>Rent/Mortgage</option>
                                            <option value='Restaurants'>Restaurants</option>
                                            <option value='Shipping'>Shipping</option>
                                            <option value='Shopping'>Shopping</option>
                                            <option value='Tithing'>Tithing</option>
                                            <option value='Travel'>Travel</option>
                                            <option value='Utilities'>Utilities</option>
                                        </select>
                                    </label>
                                    <label>
                                        Name<span> *</span>
                                        <input type='text' name='name' placeholder='Walmart' required>
                                    </label>
                                    <label>
                                        Amount Spent<span> *</span>
                                        <input type='number' name='amountSpent' placeholder='$100' required>
                                    </label>
                                    <div class='login_button'>
                                        <input type='submit' name='submit' value='Add New Entry'>
                                        <!-- Add the action key and value pair -->
                                        <input type='hidden' name='action' value='SpendEntry'>
                                        <input type='hidden' name='spendTrackerId' value='";
                                            if (isset($tracker['spendTrackerId'])) {echo $tracker['spendTrackerId'];}
                                            elseif (isset($spendTrackerId)) {echo $spendTrackerId;}
                                        echo "'>
                                    </div>";
                                }
                            ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/footer.php'; ?>
    </footer>
    <script src="/budget/js/hamburger.js"></script>
</body>

</html>
