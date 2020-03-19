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
                    <a href="/budget/saving/?action=save">
                        <img src="/budget/images/save_vector_transparent_200.png" alt="Save money icon">
                        <h2>Savings Tracker</h2>
                        <h4>Enjoy our easy-to-use saving tool to help you keep track of your savings.</h4>
                    </a>
                </div>
                <div class="box_1">
                    <a href="/budget/spending/?action=spend">
                        <img src="/budget/images/spend_vector_transparent_200.png" alt="Spend money icon">
                        <h2>Spending Tracker</h2>
                        <h4>Keep track of your spending habits so you can gain control of your life.</h4>
                    </a>
                </div>
                <div class="box_1">
                    <a href="/budget/debt/?action=debt">
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
                        <h2>15 Budgeting Tips for Your Daily Life</h2>
                        <h3>by Rachel Cruze #1 New York Times best-selling author</h3>
                    </div>
                    <picture class="info_image">
                        <source media="(max-width: 400px)" srcset="/budget/images/budget_tips_350.jpg">
                        <img title="Budget charts"  src="/budget/images/budget_tips_550.jpg" alt="Budget charts">
                    </picture>
                    <div class="info_text">
                        <ol>
                            <li>Budget to zero before the month begins</li>
                            <li>Do the budget together</li>
                            <li>Every month is different</li>
                            <li>Start with the important categories first</li>
                            <li>Pay off your debt</li>
                            <li>Don’t be afraid to trim the budget</li>
                            <li>Make a schedule (and stick to it)</li>
                            <li>Track your progress</li>
                            <li>Create a buffer in your budget</li>
                            <li>Cut up your credit cards</li>
                            <li>Use cash for certain budget categories that trip you up</li>
                            <li>Tray an online budget tool</li>
                            <li>Be content and quit the comparisons</li>
                            <li>Have goals</li>
                            <li>Give yourself lots of grace</li>
                        </ol>
                        <p class="out_link"><a href="https://www.daveramsey.com/blog/the-truth-about-budgeting/" target="_blank">See Full Article</a></p>
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
