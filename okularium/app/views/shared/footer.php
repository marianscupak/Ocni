<footer>
    <div class="footer-wrap">
        <div class="contacts">
            <ul>
                <li><img src="/Ocni/domaci-optika/public/images/icon_location.png">Sokolská třída 2800/99, Ostrava</li>
                <li><img src="/Ocni/domaci-optika/public/images/icon_contact.png">739 029 743</li>
                <li><img src="/Ocni/domaci-optika/public/images/icon_email.png">sylva.smehlikova@gmail.com</li>
            </ul>
        </div>
        <div class="copyright"><h2>© 2017 Všechna práva vyhrazena.</h2></div>
    </div>
</footer>
<div id="message">
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
        }
        if (isset($_GET['update'])) {
            if ($_GET['update'] == 1) {
                echo 'Úspěšně aktualizováno.';
            }
        }
    ?>
</div>
<div class="loginWrapper">
    <div class="loginForm">
        <img id="close" src="/Ocni/domaci-optika/public/images/close.png" onclick="closeLogin();">
        <h1 id="welcome">Vítejte zpět!</h1>
        <img id="welcomeImg" src="/Ocni/okularium/public/images/icon.png">
        <form action="/Ocni/okularium/public/uzivatel/login" method="post">
            <input id="login" name="login" type="email" placeholder="E-mail" required>
            <input id="password" name="password" type="password" placeholder="Heslo" required>
            <input type="submit" value="Přihlásit se">
        </form>
    </div>
</div>
<img src="/Ocni/domaci-optika/public/images/close.png" id="messageClose" onclick=hideMess()>
<script src="/Ocni/shared_resources/js/message.js"></script>
<script src="/Ocni/shared_resources/js/header.js"></script>
<script src="/Ocni/okularium/public/js/login.js"></script>
</body>
</html>