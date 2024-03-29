<!DOCTYPE HTML>
<html lang="cs">
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo SHARED_RES_PREFIX; ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo SHARED_RES_PREFIX; ?>/css/main_style.css">
    <link rel="stylesheet" href="<?php echo SHARED_RES_PREFIX; ?>/css/footer.css">
    <link rel="stylesheet" href="<?php echo SHARED_RES_PREFIX; ?>/css/eshop.css">
    <link rel="stylesheet" href="<?php echo OK_RES_PREFIX; ?>/css/colors.css">
    <link rel="stylesheet" href="<?php echo OK_RES_PREFIX; ?>/css/main_style.css">
    <link rel="stylesheet" href="<?php echo OK_RES_PREFIX; ?>/css/flatpickr.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo OK_RES_PREFIX; ?>/images/icon.png">
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- TODO: SEO 
    <meta name="description" content="Domácí optika"> 
    -->
    <title><?= $data['title'] ?></title>
</head>
<body>
    <header>
        <div class="headerLogo">
            <a href="<?php echo LINK_PREFIX; ?>/">
                <img src="<?php echo OK_RES_PREFIX; ?>/images/logo_klinika.png" alt="Okularium">
            </a>
        </div>
        <button onclick="responsiveMenu();" class="menuImg"><img src="<?php echo DO_RES_PREFIX; ?>/images/menu.png" alt="menu"></button>
        <div class="stickyHeader-hide stickyHeader">
            <a href="<?php echo LINK_PREFIX; ?>/"><img src="<?php echo OK_RES_PREFIX; ?>/images/logo_klinika.png" alt="Okularium" class="stickyImg"></a>
            <nav class="navigation">
                <ul>
                    <li><a href="<?php echo LINK_PREFIX; ?>/">Domů</a></li>
                    <li class="dropdownHeader" onclick="dropdownMenu(0);"><a>O nás<img src="<?php echo DO_RES_PREFIX; ?>/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="<?php echo LINK_PREFIX; ?>/informace">Informace</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/cenik">Ceník</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/kontakty">Kontakt</a></li>
                        </ul>
                    </li>
                    <?php
                        if (!empty($_SESSION)) {
                            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                                ?>
                    <li class="dropdownHeader" onclick="dropdownMenu(1);"><a>Administrace<img src="<?php echo DO_RES_PREFIX; ?>/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="<?php echo LINK_PREFIX; ?>/pacienti">Pacienti</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/pacienti/pridat">Přidat pacienta</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/prohlidky">Prohlídky</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/prohlidky/pridat">Objednat prohlídku</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/ordinacni_hodiny">Upravit ordinační hodiny</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/cenik/upravit">Upravit ceník</a></li>
                        </ul>
                    </li>
                    <?php
                            }
                        }
                    ?>
                    <li><a href="<?php echo DO_LINK_PREFIX; ?>/">Optika</a></li>   <!-- Link na domaci optiku -->
                    <?php
                        if (empty($_SESSION)) {
                            echo '<li><a onclick="loginForm();">Přihlásit se</a></li>';
                        }
                        else {
                            echo '<li><a href="' . LINK_PREFIX . '/uzivatel/">Profil</a></li>';
                            echo '<li><a href="' . LINK_PREFIX . '/uzivatel/logout">Odhlásit se</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
