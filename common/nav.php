<div class="nav">
    <button onclick="toggleMenu()" class="menuButton">&#9776;</button>
    <ul id="clickMenu" class="hide">
        <li><a href="/budget/" title="Budget home page">Home</a></li>
        <li><a href="/budget/saving/?action=save" title="Budget saving page">Track Saving</a></li>
        <li><a href="/budget/spending/?action=spend" title="Budget spending page">Track Spending</a></li>
        <li><a href="/budget/debt/?action=debt" title="Budget debt page">Track Debt</a></li>

        <?php
        if(isset($_SESSION['loggedin'])) {
        echo 
            '<li class="logout">
                <a href="/budget/accounts/?action=Logout">
                    <img alt="logout icon" src="/budget/images/logout-icon_75.png">
                </a>
            </li>';
        }

        ?>

    </ul>
</div>
