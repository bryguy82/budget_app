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
                            <th>Start</th>
                            <th class='hide'>Deposit</th>
                            <th class='hide'>Earned</th>
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
                    <form class="input" action="/budget/saving/index.php" method="post">
                        <fieldset class="calculate">

                            <!-- Only first entry will include start value -->
                            <?php
                                if (count($trackerData) == 0) {
                                    echo 
                                    "<label>
                                        Deposit Date<span> *</span>
                                        <input type='date' name='saveDate' required>
                                    </label>
                                    <label>
                                        Starting Value<span> *</span>
                                        <input type='number' name='start' placeholder='$1000' required>
                                    </label>
                                    <label>
                                        Deposit Amount<span> *</span>
                                        <input type='number' name='deposit' placeholder='$100' required>
                                    </label>
                                    <div class='login_button'>
                                        <input type='submit' name='submit' value='Add New Entry'>
                                        <!-- Add the action key and value pair -->
                                        <input type='hidden' name='action' value='SaveNewEntry'>
                                        <input type='hidden' name='trackerId' value='";
                                            if (isset($tracker['trackerId'])) {echo $tracker['trackerId'];}
                                            elseif (isset($trackerId)) {echo $trackerId;}
                                        echo "'>
                                    </div>";
                                } elseif (count($trackerData) > 0) {
                                    echo
                                    "<label>
                                        Deposit Date<span> *</span>
                                        <input type='date' name='saveDate' required>
                                    </label>
                                    <label>
                                        Deposit Amount<span> *</span>
                                        <input type='number' name='deposit' placeholder='$100' required>
                                    </label>
                                    <div class='login_button'>
                                        <input type='submit' name='submit' value='Add New Entry'>
                                        <!-- Add the action key and value pair -->
                                        <input type='hidden' name='action' value='SaveEntry'>
                                        <input type='hidden' name='trackerId' value='";
                                            if (isset($tracker['trackerId'])) {echo $tracker['trackerId'];}
                                            elseif (isset($trackerId)) {echo $trackerId;}
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
