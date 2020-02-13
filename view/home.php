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
        <div class="nav">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/budget/common/nav.php'; ?>
        </div>
    </nav>
    <main>
        <div class="hero">
            <div>
                <div class="page_title">
                    <h1>Take Control of your Finances Today!</h1>
                </div>
                <picture class="hero_image">
                    <source media="(max-width: 400px)" srcset="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_400.jpg">
                    <source media="(max-width: 650px)" srcset="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_650.jpg">
                    <img title="Make a Change"  src="/budget/images/kat-yukawa-K0E6E0a0R3A-unsplash_900.jpg" alt="Woman holding coins in her hands">
                </picture>
            </div>
        </div>
        <article class="trackers">
            <div>
                <div class="box_1">
                    <a href="/budget/saving/">
                        <img src="/budget/images/save_vector_transparent_200.png" alt="Save money icon">
                        <h2>Savings Tracker</h2>
                        <h4>Enjoy our easy-to-use saving tool to help you keep track of your savings.</h4>
                    </a>
                </div>
                <div class="box_1">
                    <a href="/budget/spending/">
                        <img src="/budget/images/spend_vector_transparent_200.png" alt="Spend money icon">
                        <h2>Spending Tracker</h2>
                        <h4>Keep track of your spending habits so you can gain control of your life.</h4>
                    </a>
                </div>
                <div class="box_1">
                    <a href="/budget/debt/">
                        <img src="/budget/images/house_vector_transparent_200.png" alt="House icon">
                        <h2>Debt Tracker</h2>
                        <h4>Manage control of your debt to reach your financial freedom.</h4>
                    </a>
                </div>
            </div>
        </article>
        <article class="tips">
            <div>
                <div class="info">
                    <div class="info_header">
                        <h2>Budgeting Tips & Tricks</h2>
                    </div>
                    <picture class="info_image">
                        <source media="(max-width: 400px)" srcset="/budget/images/budget_tips_350.jpg">
                        <img title="Budget charts"  src="/budget/images/budget_tips_550.jpg" alt="Budget charts">
                    </picture>
                    <div class="info_text">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
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
