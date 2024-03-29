<main class="container">
    <div class="mainPanel">
        <?php
            if (empty($_SESSION)) {
        ?>
        <div class="slideshow">
            <img src="<?php echo OK_RES_PREFIX; ?>/images/slideshow_dummy_1.jpg" alt="Okularium">
            <img src="<?php echo OK_RES_PREFIX; ?>/images/slideshow_dummy_2.jpg" alt="Okularium">
        </div>
        <h1>DOMLUVTE SI SCHŮZKU</h1>
        <div class="optionContainer">
            <div class="option">
                <h2>Ještě jste u nás nebyli?</h2>
                <a href="<?php echo LINK_PREFIX; ?>/kontakty" class="blockLink"><img src="<?php echo DO_RES_PREFIX; ?>/images/icon_contact.png" alt="Kontakty"></a>
                <p>Neváhejte nás <a href="<?php echo LINK_PREFIX; ?>/kontakty" class="link">kontaktovat</a> prostřednictvím telefonu nebo emailu.</p>
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
                <a href="<?php echo LINK_PREFIX; ?>/pacienti" class="card">
                    <img src="<?php echo OK_RES_PREFIX; ?>/images/patient.png" alt="Pacienti">
                    <h2>Pacienti</h2>
                </a>
                <a href="<?php echo LINK_PREFIX; ?>/pacienti/pridat" class="card">
                    <img src="<?php echo OK_RES_PREFIX; ?>/images/patient.png" alt="Přidat pacienta">
                    <h2>Přidat pacienta</h2>
                </a>
                <a href="<?php echo LINK_PREFIX; ?>/prohlidky" class="card">
                    <img src="<?php echo OK_RES_PREFIX; ?>/images/exam.png" alt="Prohlídky">
                    <h2>Prohlídky</h2>
                </a>
                <?php
                    }
                ?>
                <a href="<?php echo LINK_PREFIX; ?>/prohlidky/pridat" class="card">
                    <img src="<?php echo OK_RES_PREFIX; ?>/images/exam.png" alt="Objednat prohlídku">
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
        echo '<script src="' . SHARED_RES_PREFIX . '/js/slideshow.js"></script>';
    }
?>
