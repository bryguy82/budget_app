<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/css.php'; ?>

    <meta name="description" content="Budget Home Page">
    <title>Home | Budget My Life</title>
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
                    <h1>Take Control of your Finances Today!</h1>
                </div>
                <!-- <picture class="hero_image">
                    <source media="(max-width: 400px)" srcset="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_400.jpg">
                    <source media="(max-width: 650px)" srcset="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_650.jpg">
                    <img title="Make a Change"  src="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_900.jpg" alt="Woman holding coins in her hands">
                </picture> -->
            </div>
        </div>

        <article class="trackers">
            <div>
                <form class="login first_form" method="post" action="/budget/accounts/">
                    <fieldset>
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
                            <input type="submit" name="submit" value="login">
                            <!-- Add the action key and value pair -->
                            <input type="hidden" name="action" value="Login">
                        </div>
                    </fieldset>
                </form>
                <div class="register">
                    <p>Not a member yet?</p>
                    <div class="abutton">
                        <a href="../accounts/?action=register">Create your account!</a>
                    </div>
                </div>
                <!-- <div class="box_1">
                    <a href="/budget/saving/">
                        <img src="/budget/images/save_vector_transparent_200.png" alt="Save money icon">
                        <h2>Savings Tracker</h2>
                        <h4>Enjoy our easy-to-use saving tool to help you keep track of your savings.</h4>
                    </a>
                </div>
                <div class="box_1">
                    <a href="/budget/debt/">
                        <img src="/budget/images/house_vector_transparent_200.png" alt="House icon">
                        <h2>Debt Tracker</h2>
                        <h4>Manage control of your debt to reach your financial freedom.</h4>
                    </a>
                </div> -->
            </div>
        </article>

    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/footer.php'; ?>
    </footer>
    <script src="/budget/js/hamburger.js"></script>
</body>

</html>
