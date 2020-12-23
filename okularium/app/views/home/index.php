<main class="container">
    <div class="mainPanel">
        <?php
            if (empty($_SESSION)) {
        ?>
        <div class="slideshow">
            <img src="/Ocni/okularium/public/images/slideshow_dummy_1.jpg" alt="Brýle">
            <img src="/Ocni/okularium/public/images/slideshow_dummy_2.jpg" alt="Brýle">
        </div>
        <h1>DOMLUVTE SI SCHŮZKU</h1>
        <div class="optionContainer">
            <div class="option">
                <h2>Ještě jste u nás nebyli?</h2>
                <a href="/Ocni/okularium/public/kontakty" class="blockLink"><img src="/Ocni/domaci-optika/public/images/icon_contact.png"></a>
                <p>Neváhejte nás <a href="/Ocni/okularium/public/kontakty" class="link">kontaktovat</a> prostřednictvím telefonu nebo emailu.</p>
            </div>
            <div class="option">
                <h2>Už jste u nás byli?</h2>
                <div class="buttonSpace">
                    <button class="loginButton" onclick="loginForm();">Přihlásit</button>
                </div>
            </div>
        </div>
        <?php
            }
            else {
        ?>
        <div class="mainSection">
            <h1>Vítejte zpět <?= $_SESSION['name'] . ' ' . $_SESSION['surname'] ?>!</h1>
            <div class="cardsContainer">
        <?php
            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
        ?>
                <a href="/Ocni/okularium/public/pacienti" class="card">
                    <img src="/Ocni/okularium/public/images/patient.png">
                    <h2>Pacienti</h2>
                </a>
                <a href="/Ocni/okularium/public/prohlidky" class="card">
                    <img src="/Ocni/okularium/public/images/exam.png">
                    <h2>Prohlídky</h2>
                </a>
                <?php
                    }
                ?>
                <a href="/Ocni/okularium/public/prohlidka" class="card">
                    <img src="/Ocni/okularium/public/images/exam.png">
                    <h2>Objednat prohlídku</h2>
                </a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</main>
<?php
    if (empty($_SESSION)) {
        echo '<script src="/Ocni/shared_resources/js/slideshow.js"></script>';
    }
?>
