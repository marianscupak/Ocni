<footer>
    <div class="footer-wrap">
        <div class="contacts">
            <ul>
                <li><img src="<?php echo DO_RES_PREFIX; ?>/images/icon_location.png" alt="Lokace">Sokolská třída 2800/99, Ostrava</li>
                <li><img src="<?php echo DO_RES_PREFIX; ?>/images/icon_contact.png" alt="Telefon">739 029 743</li>
                <li><img src="<?php echo DO_RES_PREFIX; ?>/images/icon_email.png" alt="E-mail">sylva.smehlikova@gmail.com</li>
            </ul>
        </div>
        <div class="copyright"><h2>© 2021 Všechna práva vyhrazena.</h2></div>
    </div>
</footer>
<div id="message">
    Web má pouze prezentační účel. 
    <?php            
        if (isset($_GET['login'])) {
            if ($_GET['login'] == 1) {
                echo 'Přihlášení úspěšné.';
            }
            else {
                echo 'Neúspěšný pokus o přihlášení.';
            }
        }
        if (isset($_GET['logout'])) {
            if ($_GET['logout'] == 1) {
                echo 'Odhlášení úspěšné.';
            }
        }
        if (isset($_GET['pwd'])) {
            if ($_GET['pwd'] == -1) {
                echo 'Staré heslo se neshoduje.';
            }
            else if ($_GET['pwd'] == 0) {
                echo 'Hesla se neshodují.';
            }
            else if ($_GET['pwd'] == 1) {
                echo 'Úspěšně aktualizováno.';
            }
        }
        if (isset($_GET['update'])) {
            if ($_GET['update'] == 1) {
                echo 'Úspěšně aktualizováno.';
            }
            else if ($_GET['update'] == 0) {
                echo 'E-mail je už zabrán.';
            }
        }
        if (isset($_GET['del'])) {
            if ($_GET['del'] == 1) {
                echo 'Úspěšně odebráno.';
            }
        }
        if (isset($_GET['add'])) {
            if ($_GET['add'] == 1) {
                echo 'Úspěšně objednáno.';
            }
            else {
                echo 'Problém s objednáním.';
            }
        }
        if (isset($_GET['uadd'])) {
            if ($_GET['uadd'] == 1) {
                echo 'Uživatel přidán.';
            }
            else {
                echo 'E-mailová adresa už je zabrána jiným uživatelem.';
            }
        }
        if (isset($_GET['hrs'])) {
            if ($_GET['hrs'] == 1) {
                echo 'Hodiny nastaveny.';
            }
            else {
                echo 'Nesmíte nastavovat 2 hodnoty pro jeden den.';
            }
        }
        if (isset($_GET['prc'])) {
            if ($_GET['prc'] == 1) {
                echo 'Ceník upraven.';
            }
            else {
                echo 'Chyba ve změně ceníku.';
            }
        }
    ?>
</div>
<div class="loginWrapper">
    <div class="loginForm">
        <img id="close" src="<?php echo DO_RES_PREFIX; ?>/images/close.png" alt="Zavřít" onclick="closeLogin();">
        <h1 id="welcome">Vítejte zpět!</h1>
        <img id="welcomeImg" src="<?php echo OK_RES_PREFIX; ?>/images/icon.png" alt="Vítejte!">
        <form action="<?php echo LINK_PREFIX; ?>/uzivatel/login" method="post">
            <input id="login" name="login" type="email" placeholder="E-mail" required>
            <input id="password" name="password" type="password" placeholder="Heslo" required>
            <input type="submit" value="Přihlásit se">
        </form>
    </div>
</div>
<img src="<?php echo DO_RES_PREFIX; ?>/images/close.png" alt="Zavřít" id="messageClose" onclick=hideMess()>
<script src="<?php echo SHARED_RES_PREFIX; ?>/js/message.js"></script>
<script src="<?php echo SHARED_RES_PREFIX; ?>/js/header.js"></script>
<script src="<?php echo OK_RES_PREFIX; ?>/js/login.js"></script>
</body>
</html>