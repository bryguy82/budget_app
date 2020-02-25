<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="Budget Registration Page">
    <title>Registration | Budget My Life</title>
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
                    <h1>Budget Tracker Registration</h1>
                    <h3>All Fields are Required.</h3>
                </div>
            </div>
        </div>

        <article class="trackers">
            <div>
                <form class="login first_form" action="/budget/accounts/index.php" method="post">
                    <fieldset>
                        <label>
                            First name<span> *</span>
                            <input type="text" name="userFirstName" placeholder="John" 
                            <?php if(isset($userFirstName)){echo "value='$userFirstName'";}  ?> required>
                        </label>
                        <label>
                            Last name<span> *</span>
                            <input type="text" name="userLastName" placeholder="Smith"
                            <?php if(isset($userLastName)){echo "value='$userLastName'";}  ?> required >
                        </label>
                        <label>
                            Email Address<span> *</span>
                            <input type="email" name="userEmail" placeholder="example@email.com"
                            <?php if(isset($userEmail)){echo "value='$userEmail'";}  ?> required >
                        </label>
                        <label>
                            Password<span> *</span>
                            <span class="pass_info">Passwords must be 8 characters long with at least 1 upper/lowercase letter, 1 number, and 1 special character</span>
                            <input 
                                type="password" name="userPassword" 
                                pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required >
                        </label>
                        <div class="login_button">
                            <input type="submit" name="submit" value="register">
                            <!-- Add the action key and value pair -->
                            <input type="hidden" name="action" value="Register">
                        </div>
                    </fieldset>
                </form>
            </div>
        </article>

    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/footer.php'; ?>
    </footer>
    <script src="/budget/js/hamburger.js"></script>
</body>

</html>
