<div class="head">
    <div class="logo">
        <a href="/budget/?action=Home">
            <img alt="Budget logo" src="/budget/images/financial_icon_money_140.jpg">
        </a>
    </div>
    <div><h1>Budget My Life</h1></div>

    <?php
        if(isset($_SESSION['loggedin'])) {
            echo 
            '<div class="login">
                <a href="/budget/accounts/?action=admin">
                    <img alt="Budget logo" src="/budget/images/user_login_icon_150.jpg">
                </a>
            </div>';
        } else {
            echo 
            '<div class="logo">
                <a href="/budget/accounts/?action=login">
                    <img alt="Budget logo" src="/budget/images/user_login_icon_150.jpg">
                </a>
            </div>';
        }
    ?>

</div>
