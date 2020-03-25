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

    <meta name="description" content="Budget User Update Page">
    <title>User Update | Budget My Life</title>
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
                    <h1>Update Account</h1>
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
            <!-- Form to create a tracker -->
                <div class="box_2">
                    <div>
                        <h2>Update User Data</h2>
                        <p>* All values are required. *</p>
                    </div>
                    <form class="login input" action="/budget/accounts/index.php" method="post">
                        <fieldset>
                            <label>
                                First name<span> *</span>
                                <input type="text" name="userFirstname" placeholder="John" 
                                <?php
                                    if(isset($_SESSION['userData']['userFirstname'])){
                                        echo "value=".$_SESSION['userData']['userFirstname'];} 
                                    else if(isset($userFirstname)){echo "value='$userFirstname'";} ?> required>
                            </label>
                            <label>
                                Last name<span> *</span>
                                <input type="text" name="userLastname" placeholder="Smith"
                                <?php if(isset($_SESSION['userData']['userLastname'])){
                                    echo "value=".$_SESSION['userData']['userLastname'];}
                                    else if(isset($userLastname)){echo "value='$userLastname'";}  ?> required >
                            </label>
                            <label>
                                Email Address<span> *</span>
                                <input type="email" name="userEmail" placeholder="example@email.com"
                                <?php if(isset($_SESSION['userData']['userEmail'])){
                                    echo "value=".$_SESSION['userData']['userEmail'];}
                                    else if(isset($userEmail)){echo "value='$userEmail'";}  ?> required >
                            </label>
                            <div class="login_button">
                                <input type="submit" name="submit" value="Update Information">
                                <!-- Add the action key and value pair -->
                                <input type="hidden" name="action" value="Update_Info">
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

        <article class="trackers">
            <div>
            <!-- Form to create a tracker -->
                <div class="box_2">
                    <div>
                        <h2>Update Password</h2>
                        <p>* All values are required. *</p>
                    </div>
                    <form class="login input" action="/budget/accounts/index.php" method="post">
                        <fieldset>
                            <label>
                                New Password<span> *</span>
                                <span class="pass_info">Passwords must be 8 characters long with at least 1 upper/lowercase letter, 1 number, and 1 special character</span>
                                <input 
                                    type="password" name="userPassword" 
                                    pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required >
                            </label>
                            <div class="login_button">
                                <input type="submit" name="submit" value="Change Password">
                                <!-- Add the action key and value pair -->
                                <input type="hidden" name="action" value="Update_Pass">
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
